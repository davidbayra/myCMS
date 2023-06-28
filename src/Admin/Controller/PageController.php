<?php

namespace App\Admin\Controller;

class PageController extends AdminController
{
    /**
     * @return void
     * @Get
     */
    public function listing(): void
    {
        $pageModel = $this->load->model('page');
        $this->data['pages'] = $pageModel->repository->getPages();
        $this->view->render('pages/list', $this->data);
    }

    public function edit($id): void
    {
        $pageModel = $this->load->model('page');
        $this->data['page'] = $pageModel->repository->getPageData($id);
        $this->view->render('pages/edit', $this->data);
    }

    /**
     * @return void
     * @Get
     */
    public function create(): void
    {
        $pageModel = $this->load->model('page');
        $data['pages'] = $pageModel->repository->getPages();
        $this->view->render('pages/create', $data['pages']);
    }

    /**
     * @return void
     * @Post
     */
    public function add(): void
    {
        $params = $this->request->post;
        $pageModel = $this->load->model('page');
        if (isset($params['title'])) {
            $pageId = $pageModel->repository->createPage($params);
            print $pageId;
        }
    }

    public function update(): void
    {
        $params = $this->request->post;
        $pageModel = $this->load->model('page');
        if (isset($params['title'])) {
            $pageId = $pageModel->repository->updatePage($params);
            print $pageId;
        }
    }
}
