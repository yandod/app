<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Database\ConnectionManager;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class SampleController extends AppController
{
    public $components = ['RequestHandler'];

    public function index()
    {
        $posts = new Table([
            'table' => 'posts',
            'connection' => ConnectionManager::get('default')
        ]);
        $results = $posts->find('all');
        $this->set('results', $results);
    }

    public function index2()
    {
        $posts = new Table([
            'table' => 'posts',
            'connection' => ConnectionManager::get('default')
        ]);
        $results = $posts->find('all')->hydrate(false)->toArray();
        $this->set('results', $results);
        $this->set('_serialize', ['results']);
    }

    public function index3()
    {
        $posts = TableRegistry::get('post');
        //debug($posts);
        $results = $posts->find('all');
        $this->set('results', $results);
    }

}