<?php
/**
 * Created by JetBrains PhpStorm.
 * User: yandod
 * Date: 2013/11/16
 * Time: 15:35
 * To change this template use File | Settings | File Templates.
 */

namespace App\Console\Command;


use App\Console\Command\AppShell;
use Cake\Database\ConnectionManager;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\Table;

class WeekendLancersShell extends AppShell {

    public $limit = 10000;

    public function main()
    {
        $posts = new Table([
            'table' => 'posts',
            'connection' => ConnectionManager::get('default')
        ]);
        $result = $posts->find('all')->toArray();
        $num = count($result);
        $this->stdout->write($num);

        if ($num > $this->limit) {
            return;
        }

        $lists = range($num, $this->limit);

        $created = 0;
        foreach ($lists as $id) {
            $entity = new Entity([
                'title' => 'title for ' . $id,
                'body' => 'http://b.hatena.ne.jp/search/tag?safe=off&q=%E3%83%A9%E3%83%B3%E3%82%B5%E3%83%BC%E3%82%BA&users=1&of40'
            ]);
            $posts->save($entity);
            $created++;
        }
        $this->stdout->write('created:' . $created);
        $this->stdout->write('OK');
    }

}