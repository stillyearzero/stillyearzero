<?php
class Pages extends Controller
{
    public function index()
    {
        $data = [];

        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [];

        $this->view('pages/about', $data);
    }
}
