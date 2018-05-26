<?php
namespace peje17\Blogg;

/**
* Blogg class with common proporties and methods
*/
class Blogg
{
    //private $db;

    /**
     * @var integer id of blogg post
     */
    protected $id;

    /**
     * @var string path to blogg post
     */
    protected $path;

    /**
     * @var string slug
     */
    protected $slug;

    /**
     * @var string title
     */
    protected $title;

    /**
     * @var string data
     */
    protected $data;

    /**
     * @var string type
     */
    protected $type;

    /**
     * @var string filter
     */
    protected $filter;

    /**
     * @var date publish date
     */
    protected $published;

    /**
     * @var date publish date
     */
    protected $textfilter;


    /**
     * Public accesible properties
     */
    public function id()
    {
        return $this->id;
    }
    public function path()
    {
        return $this->path;
    }
    public function slug()
    {
        return $this->slug;
    }
    public function title()
    {
        return $this->title;
    }
    public function data()
    {
        return $this->data;
    }
    public function type()
    {
        return $this->type;
    }
    public function filter()
    {
        return $this->filter;
    }
    public function published()
    {
        return $this->published;
    }



    /**
     * Constructor
     *
     * @param Database database object to query
     */
    public function __construct($db, $searchId = -1)
    {
        $this->db  = $db;
        $this->textfilter = new TextFilter1();
    }



    /**
     * Function to get spcific blogg
     *
     */
    public function getContent($searchId)
    {
        $sql = "SELECT * FROM content WHERE id = $searchId;";
        $res = $this->db->executeFetchAll($sql);
        $this->id = $res[0]->id;
        $this->path = $res[0]->path;
        $this->slug = $res[0]->slug;
        $this->title = $res[0]->title;
        $this->data = $res[0]->data;
        $this->type = $res[0]->type;
        $this->filter = $res[0]->filter;
        $this->published = $res[0]->published;
        return $this;
    }



    /**
     * Function update content
     *
     */
    public function updateContent($fieldArray)
    {
        $sql = "UPDATE content SET title=?, path=?, slug=?, data=?, type=?, filter=?, published=? WHERE id = ?;";
        $this->db->execute($sql, array_values($fieldArray));
        return true;
    }



    /**
     * Function to delete content
     *
     */
    public function deleteContent($fieldArray)
    {
        $sql = "UPDATE content SET deleted = CURRENT_TIMESTAMP WHERE id = ?;";
        $this->db->execute($sql, $fieldArray);
        return true;
    }



    /**
     * Function to add content
     *
     */
    public function addContent($fieldArray)
    {
        $fieldArray["contentSlug"] = $this->getValidSlug($fieldArray["contentSlug"]);
        $sql = "INSERT INTO content (title, path, slug, data, type, filter, published) VALUES(?, ?, ?, ?, ?, ?, ?);";
        $this->db->execute($sql, array_values($fieldArray));
        return true;
    }




    /**
     * Function to verify unique path
     *
     */
    public function uniquePath($inputPath)
    {
        $sql = "SELECT COUNT(*) AS count FROM content WHERE path = ?";
        $res = $this->db->executeFetchAll($sql, [$inputPath]);
        $validPath = ($res[0]->count == 0) ? true : false;
        return $validPath;
    }




    /**
     * Function to get valid unique slug
     *
     */
    private function getValidSlug($inputSlug)
    {
        $validSlug = false;
        $i = 0;
        do {
            $inputSlug .= $i;
            $sql = "SELECT COUNT(*) AS count FROM content WHERE slug = ?";
            $res = $this->db->executeFetchAll($sql, [$inputSlug]);
            //print_r($count);
            $validSlug = ($res[0]->count == 0) ? true : false;
        } while (!$validSlug);
        return $inputSlug;
    }
}
