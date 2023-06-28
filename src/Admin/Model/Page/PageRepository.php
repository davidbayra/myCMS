<?php

namespace App\Admin\Model\Page;

use App\Engine\Model;

class PageRepository extends Model
{
    public function getPages()
    {
        $query = $this->queryBuilder
            ->select()
            ->from('page')
            ->orderBy('id', 'DESC')
            ->getQuery();

        return $this->db->query($query);
    }

    public function createPage($params): int
    {
        print_r($params);
        $page = new Page();
        $page->setTitle($params['title']);
        $page->setContent($params['content']);
        return $page->save();
    }
    public function updatePage($params): void
    {
        if (isset($params['page_id'])) {
            print_r($params);
            $page = new Page($params['page_id']);
            $page->setTitle($params['title']);
            $page->setContent($params['content']);
            $page->save();
        }
    }

    public function getPageData($id)
    {
        $page = new Page($id);
        return $page->findOne();
    }
}
