<?php
/**
 * App specific routes.
 */



    /**
     * Show all post and pages in a list
     */
    $app->router->get("blogg", function () use ($app) {
        $data = [
            "title"  => "Content database | oophp",
            "pagetitle" => "Show All"
        ];
        $db = $app->db->connect();
        $blogglist = new peje17\Blogg\BloggList($db);
        $data["resultset"] = $blogglist->getAll($db);

        $app->view->add("blogg/index", $data);
        $app->page->render($data);
    });



    /**
     * Handle Blogg main menu actions
     */
    $app->router->post("blogg", function () use ($app) {
        $db = $app->db->connect();
        $blogglist = new peje17\Blogg\BloggList($db);

        if ($app->request->getPost("btnAdmin")) {
            $data = [
                "title"  => "Content database | oophp",
                "pagetitle" => "Admin"
            ];
            $data["resultset"] = $blogglist->getDeltedAll($db);

            $app->view->add("blogg/admin", $data);
            $app->page->render($data);
        } elseif ($app->request->getPost("btnShowAll")) {
            $data = [
                "title"  => "Content database | oophp",
                "pagetitle" => "Show All"
            ];

            $data["resultset"] = $blogglist->getAll($db);

            $app->view->add("blogg/index", $data);
            $app->page->render($data);
        } elseif ($app->request->getPost("btnCreate")) {
            $data = [
                "title"  => "Content database | oophp",
                "pagetitle" => "Add"
            ];
            $app->view->add("blogg/addcontent", $data);
            $app->response->redirect("blogg/addcontent", $data);
        } elseif ($app->request->getPost("btnResetDB")) {
            $data = [
                "title"  => "Content database | oophp",
                "pagetitle" => "Reset"
            ];
            $blogglist->resetDB();
            $app->response->redirect("blogg/index", $data);
        } elseif ($app->request->getPost("btnPages")) {
            $data = [
                "title"  => "Content database | oophp",
                "pagetitle" => "Show Pages"
            ];
            $data["resultset"] = $blogglist->getPages();
            $app->view->add("blogg/pagelist", $data);
            $app->page->render($data);
        } elseif ($app->request->getPost("btnPosts")) {
            $data = [
                "title"  => "Content database | oophp",
                "pagetitle" => "Show Posts"
            ];
            $data["resultset"] = $blogglist->getPosts();
            $app->view->add("blogg/postlist", $data);
            $app->page->render($data);
        }
    });



    /**
     * Handle Blogg admin actions
     */
    $app->router->post("blogg/admin", function () use ($app) {

        if ($app->request->getPost("btnEdit")) {
            $data = [
                "title"  => "Edit Blogg | oophp",
                "pagetitle" => "Edit Blogg"
            ];
            $app->view->add("blogg/editcontent", $data);
            $app->response->redirect("movie/editfilm", $data);
        }
    });



    /**
    ********************************************************************
     * Handle Blog edit actions
     ********************************************************************
     */
    $app->router->get("blogg/editcontent", function () use ($app) {
        $data = [
            "title"  => "Content database | oophp",
            "pagetitle" => "Edit Blogg"
        ];
        $resultset = [];
        $searchId = $app->request->getGet("Id");

        if ($searchId) {
            $db = $app->db->connect();
            $bloggcontent = new peje17\Blogg\Blogg($db, $searchId);
            $data["resultset"] = $bloggcontent->getContent($searchId);
        }

        $app->view->add("blogg/editcontent", $data);
        $app->page->render($data);
    });

    $app->router->post("blogg/editcontent", function () use ($app) {
        $db = $app->db->connect();
        $bloggcontent = new peje17\Blogg\Blogg($db, $app->request->getPost("contentId"));

        if ($app->request->getPost("btnSave")) {
            $data = [
                 "title"  => "Content database | oophp",
                 "pagetitle" => "Edit Blogg"
            ];
            $params["contentTitle"] = $app->request->getPost("contentTitle");
            $params["contentPath"] = $app->request->getPost("contentPath");
            $params["contentSlug"] = $app->request->getPost("contentSlug");
            $params["contentData"] = $app->request->getPost("contentData");
            $params["contentType"] = $app->request->getPost("contentType");
            $params["contentFilter"] = $app->request->getPost("contentFilter");
            $params["contentPublish"] = $app->request->getPost("contentPublish");
            $params["contentId"] = $app->request->getPost("contentId");

            $bloggcontent->updateContent($params);
            $app->response->redirect("blogg", $data);
        } elseif ($app->request->getPost("btnCancel")) {
            $data = [
                "title"  => "Content database | oophp",
                "pagetitle" => "Edit Blogg"
            ];
            $app->response->redirect("blogg", $data);
        } elseif ($app->request->getPost("btnDelete")) {
            $data = [
                "title"  => "Content database | oophp",
                "pagetitle" => "Edit Blogg"
            ];
            $params["contentId"] = $app->request->getPost("contentId");
            $bloggcontent->deleteContent($params);
            $app->response->redirect("blogg");
        }
    });



    /**
    ********************************************************************
     * Handle Create Content
     ********************************************************************
     */
    $app->router->get("blogg/addcontent", function () use ($app) {
        $data = [
            "title"  => "Content database | oophp",
            "pagetitle" => "Show All"
        ];
        $app->view->add("blogg/addcontent", $data);
        $app->page->render($data);
    });

    $app->router->post("blogg/addcontent", function () use ($app) {
        $db = $app->db->connect();
        $bloggcontent = new peje17\Blogg\Blogg($db);

        if ($app->request->getPost("btnSave")) {
            $data = [
                "title"  => "Content database | oophp",
                "pagetitle" => "Content"
            ];
            $params["contentTitle"] = $app->request->getPost("contentTitle");
            $params["contentPath"] = $app->request->getPost("contentPath");
            $params["contentSlug"] = $app->request->getPost("contentSlug");
            $params["contentData"] = $app->request->getPost("contentData");
            $params["contentType"] = $app->request->getPost("contentType");
            $params["contentFilter"] = $app->request->getPost("contentFilter");
            $params["contentPublish"] = $app->request->getPost("contentPublish");

            if (!$params["contentPath"]) {
                $params["contentPath"] = null;
            }
            if (!$bloggcontent->uniquePath($params["contentPath"])) {
                die("Not not unique path");
            }

            $bloggcontent->addContent($params);
            $app->response->redirect("blogg");
        } elseif ($app->request->getPost("btnCancel")) {
            $data = [
                "title"  => "Content database | oophp",
                "pagetitle" => "Content"
            ];
            $app->response->redirect("blogg");
        }
    });



    /**
    ********************************************************************
     * Handle Page view actions
     ********************************************************************
     */
    $app->router->get("blogg/pageview", function () use ($app) {
        $db = $app->db->connect();
        $bloggcontent = new peje17\Blogg\BloggPage($db);
        $data = [
            "title"  => "Edit Blogg | oophp",
            "pagetitle" => "View Page"
        ];
        $resultset = [];
        $searchId = $app->request->getGet("Id");
        if ($searchId) {
            $data["resultset"] = $bloggcontent->getFilteredContent($searchId);
        }
        $app->view->add("blogg/pageview", $data);
        $app->page->render($data);
    });

    $app->router->post("blogg/pageview", function () use ($app) {
        if ($app->request->getPost("btnReturn")) {
            $data = [
                "title"  => "Content database | oophp",
                "pagetitle" => "Content"
            ];
            $app->response->redirect("blogg", $data);
        }
    });



    /**
    ********************************************************************
     * Handle Blog Post actions
     ********************************************************************
     */
    $app->router->get("blogg/postview", function () use ($app) {
        $data = [
            "title"  => "Edit Blogg | oophp",
            "pagetitle" => "View Post"
        ];
        $resultset = [];
        $searchId = $app->request->getGet("Id");

        if ($searchId) {
            $db = $app->db->connect();
            $bloggcontent = new peje17\Blogg\BloggPost($db, $searchId);
            $data["resultset"] = $bloggcontent->getFilteredContent($searchId);
        }
        $app->view->add("blogg/postview", $data);
        $app->page->render($data);
    });

    $app->router->post("blogg/postview", function () use ($app) {
        if ($app->request->getPost("btnReturn")) {
            $data = [
                "title"  => "Content database | oophp",
                "pagetitle" => "Content"
            ];
            $app->response->redirect("blogg", $data);
        }
    });
