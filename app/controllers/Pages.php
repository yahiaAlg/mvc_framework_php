<?php
class Pages extends Controller
{
    private $postModel;
    public function __construct()
    {
        echo "PAGES CONTROLLER LAUNCHED";
        $this->postModel = $this->model("post");
    }

    public function index() {
        // exploding the data assoc array so it's key can be accessed as variables directly in the view
        $posts = $this->postModel->fetchAllPosts();
        $data = [
            'title' => 'Home',
            'description' => 'Simple social network built on the MVC framework',
            'posts' => $posts
        ];
        
        $this->view('pages/index', $data);
    }
    public function about() {
        $data = [
            'title' => 'About Us',
            'description' => 'App to show the about us page'
        ];
        $this->view("pages/about",$data);
    }
}
