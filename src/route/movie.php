<?php
/**
 * App specific routes.
 */
//var_dump(array_keys(get_defined_vars()));



    /**
     * Show all movies.
     */
    $app->router->get("movie", function () use ($app) {
        $data = [
            "title"  => "Movie database GET | oophp",

        ];
        $app->db->connect();
        $sql = "SELECT * FROM movie;";
        $res = $app->db->executeFetchAll($sql);
        $data["resultset"] = $res;

        $app->view->add("movie/index", $data);
        $app->page->render($data);
    });

    /**
     * Handle move actions.
     */
    $app->router->post("movie", function () use ($app) {

        if ($app->request->getPost("btnSearchTitle")) {
            $data = [
                "title"     => "Movie database POST | oophp",
                "action"    => "movie/searchtitle",
                "method"    => "get",
                "searchTitle"    => "",
            ];
            $app->view->add("movie/searchtitle", $data);
            $app->response->redirect("movie/searchtitle", $data);
        } elseif ($app->request->getPost("btnSearchYear")) {
            $data = [
                "title"     => "Movie database | oophp",
                "action"    => "movie/searchyear",
                "method"    => "get",
                "searchYearFrom"    => "",
                "searchYearTo"    => "",
            ];
            $app->view->add("movie/searchyear", $data);
            $app->response->redirect("movie/searchyear", $data);
        } elseif ($app->request->getPost("btnAddFilm")) {
            $resultset = [];
            $searchId = -1;

            $data = [
                "title"     => "Add Film ",
                "action"    => "movie/editfilm",
                "method"    => "get",
                "resultset" => $resultset,
                "edittype"    => "add",
            ];
            $app->view->add("movie/editfilm", $data);
            $app->response->redirect("movie/editfilm", $data);
        } elseif ($app->request->getPost("btnEdit")) {
            $resultset = [];
            $searchId = $app->request->getGet("Id");
            if ($searchId) {
                $app->db->connect();
                $sql = "SELECT * FROM movie WHERE id = ?;";
                $resultset = $app->db->executeFetchAll($sql, [$searchId]);
            }

            $data = [
                "title"     => "Edit Film Post",
                "action"    => "movie/editfilm",
                "method"    => "get",
                "resultset" => $resultset,
                "edittype"    => "edit",
            ];
            $app->view->add("movie/editfilm", $data);
            $app->response->redirect("movie/editfilm", $data);
        } else {
        }
    });

    /**
     * Handle Search Title.
     */
    $app->router->get("movie/searchtitle", function () use ($app) {
        $resultset = [];
        $searchTitle = $app->request->getGet("searchTitle");
        if ($searchTitle) {
            $app->db->connect();
            $sql = "SELECT * FROM movie WHERE title LIKE ?;";
            $resultset = $app->db->executeFetchAll($sql, [$searchTitle]);
        }

        $data = [
            "title"     => "Search title POST",
            "action"    => "movie/searchtitle",
            "method"    => "get",
            "searchTitle"    => $searchTitle,
            "resultset" => $resultset,
        ];

        $app->view->add("movie/searchtitle", $data);
        $app->page->render($data);
    });



    /**
     * Handle Search Year.
     */
    $app->router->get("movie/searchyear", function () use ($app) {
        $resultset = [];
        $searchYearFrom = $app->request->getGet("searchYearFrom") ??  0;
        $searchYearTo = $app->request->getGet("searchYearTo") ?? 9999;
        if ($searchYearFrom > $searchYearTo) {
            $wrkyear = $$searchYearFrom;
            $searchYearFrom = $searchYearTo;
            $searchYearTo = $wrkyear;
        }
        if ($searchYearTo && $searchYearFrom) {
            $app->db->connect();
            $sql = "SELECT * FROM movie WHERE year >= ? AND year <= ?;";
            $resultset = $app->db->executeFetchAll($sql, [$searchYearFrom, $searchYearTo]);
        }

        $data = [
            "title"     => "Search Year ",
            "action"    => "movie/searchyear",
            "method"    => "get",
            "searchYearFrom"    => $searchYearFrom,
            "searchYearTo"    => $searchYearTo,
            "resultset" => $resultset,
        ];
        $app->view->add("movie/searchyear", $data);
        $app->page->render($data);
    });


    /**
     * Handle Edit filem.
     */
    $app->router->get("movie/editfilm", function () use ($app) {
        $resultset = [];
        $title = "Add film";
        $searchId = $app->request->getGet("Id");
        if ($searchId) {
            $title = "Edit film";
            $app->db->connect();
            $sql = "SELECT * FROM movie WHERE id = ?;";
            $resultset = $app->db->executeFetchAll($sql, [$searchId]);
        }
        $data = [
            "edittype" => "edit",
            "title" => $title,
            "action"    => "movie/editfilm",
            "method"    => "post",
            "resultset" => $resultset,
        ];
        $app->view->add("movie/editfilm", $data);
        $app->page->render($data);
    });

    /**
     * Handle move actions.
     */
    $app->router->post("movie/editfilm", function () use ($app) {
        if ($app->request->getPost("btnSave")) {
            $editId = $app->request->getPost("id");
            $editImage = $app->request->getPost("image");
            $editYear = $app->request->getPost("year");
            $editTitle = $app->request->getPost("title");
            $editType = $app->request->getPost("edittype");

            $app->db->connect();
            if ($editType = "Add") {
                $sql = "INSERT INTO movie (image, title, year) VALUES(?, ?, ?);";
                $app->db->execute($sql, [$editImage, $editTitle, $editYear]);
            } else {
                $sql = "UPDATE movie SET image = ? , title = ?, year = ? WHERE id = ?;";
                $app->db->execute($sql, [$editImage, $editTitle, $editYear,  $editId]);
            }
        }
        $app->response->redirect("movie/index");
    });



    /**
     * Handle Edit filem.
     */
    $app->router->get("movie/addfilm", function () use ($app) {
        $resultset = [];
        $searchId = -1;
        $data = [
            "title"     => "Add Film ",
            "action"    => "movie/editfilm",
            "method"    => "get",
            "resultset" => $resultset,
        ];
        $app->view->add("movie/editfilm", $data);
        $app->response->redirect("movie/editfilm", $data);
    });


        /**
         * Handle Edit filem.
         */
        $app->router->get("movie/deletefilm", function () use ($app) {
            $resultset = [];
            $title = "Confirm delete of film";
            $searchId = $app->request->getGet("Id");
            if ($searchId) {
                $app->db->connect();
                $sql = "SELECT * FROM movie WHERE id = ?;";
                $resultset = $app->db->executeFetchAll($sql, [$searchId]);
            }
            $data = [
                "title" => $title,
                "action"    => "movie/deletefilm",
                "method"    => "post",
                "resultset" => $resultset,
            ];
            $app->view->add("movie/deletefilm", $data);
            $app->page->render($data);
        });

        /**
         * Handle delete actions.
         */
        $app->router->post("movie/deletefilm", function () use ($app) {
            if ($app->request->getPost("btnDelete")) {
                $editId = $app->request->getPost("id");
                $app->db->connect();
                $sql = "DELETE FROM movie WHERE id = ?;";
                $app->db->execute($sql, [$editId]);
            }
            $app->response->redirect("movie/index");
        });
