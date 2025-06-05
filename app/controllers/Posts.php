<?php
class Posts extends Controller
{
    private $postModel;
    private $userModel;

    public function __construct()
    {
        /*         if (!isLoggedIn()) {
            redirect('users/login');
        } */

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $posts = $this->postModel->getPosts();

        foreach ($posts as $value) {
            $user = $this->userModel->getUserById($value->user_id);
            $value->name = $user->name;
        };

        $data = [
            'posts' => $posts
        ];

        $this->view('posts/index', $data);
    }

    public function add()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        // $image_url = upload();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            // TODO Kolla upp
            $_POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $upload_result = null;
            $upload_error = null;

            if (checkIfUpload()) {
                if (!checkForUploadErrors()) {
                    $upload_result = uploadImage();
                } else {
                    $upload_error = checkForUploadErrors();
                }
            }

            $data = [
                'title' => trim($_POST['title']),
                'image_url' => $upload_result,
                'image_alt' => trim($_POST['image_alt']),
                // 'image_alt' => trim($resultz),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_error' => '',
                'upload_error' => '',
                'body_error' => ''
            ];

            // Validate title
            if (empty($data['title'])) {
                $data['title_error'] = 'Please enter a title';
            }

            // Validate upload
            if (checkForUploadErrors()) {
                $data['upload_error'] = $upload_error;
            }

            // Validate body
            if (empty($data['body'])) {
                $data['body_error'] = 'Please enter text';
            }

            // Check if errors
            if (empty($data['title_error']) && empty($data['upload_error']) && empty($data['body_error'])) {
                if ($this->postModel->addPost($data)) {
                    flash('post_message', 'Post Added');
                    redirect('posts');
                } else {
                    die('Somfhing phukky');
                }
            } else {
                $this->view('posts/add', $data);
            }
        } else {
            $data = [
                'title' => '',
                'image_url' => '',
                'image_alt' => '',
                'body' => '',
                'title_error' => '',
                'upload_error' => '',
                'body_error' => ''
            ];

            $this->view('posts/add', $data);
        }
    }

    public function show($id)
    {
        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);

        $data = [
            'post' => $post,
            'user' => $user
        ];

        $this->view('posts/show', $data);
    }

    public function edit($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array

            // TODO
            $_POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
            ];

            // Validate data
            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }
            if (empty($data['body'])) {
                $data['body_err'] = 'Please enter body text';
            }

            // Make sure no errors
            if (empty($data['title_err']) && empty($data['body_err'])) {
                // Validated
                if ($this->postModel->updatePost($data)) {
                    flash('post_message', 'Post Updated');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('posts/edit', $data);
            }
        } else {
            // Get existing post from model
            $post = $this->postModel->getPostById($id);

            // Check for owner
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts');
            }

            $data = [
                'id' => $id,
                'title' => $post->title,
                'body' => $post->body,
                'title_err' => '',
                'body_err' => ''
            ];

            $this->view('posts/edit', $data);
        }
    }

    public function delete($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get existing post from model
            $post = $this->postModel->getPostById($id);

            // Check for owner
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts');
            }

            if ($this->postModel->deletePost($id)) {
                // Delete image from server
                if ($post->image_url && file_exists($_SERVER['DOCUMENT_ROOT'] . "/public/uploads/". $post->image_url)) {
                    unlink($_SERVER['DOCUMENT_ROOT'] . "/public/uploads/" . $post->image_url);
                }

                flash('post_message', 'Post Removed');
                redirect('posts');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('posts');
        }
    }
}
