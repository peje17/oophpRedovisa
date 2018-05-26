<?php
namespace peje17\Blogg;

/**
 * A graphic dice.
 */
class BloggPost extends Blogg
{
    private $filters = [
        "bbcode"    => "bbcode2html",
        "link"      => "makeClickable",
        "markdown"  => "markdown",
        "nl2br"     => "nl2br",
    ];



    /**
     * Constructor to initiate the dice with six number of sides.
     */
    public function __construct($db, $searchId = -1)
    {
        parent::__construct($db, $searchId = -1);
    }

    /**
     * @var array $filters Supported filters with method names of
     *                     their respective handler.
     */



     /**
      * Function to get a Post Entry
      *
      */
    public function getFilteredContent($searchId)
    {
         $sql = "SELECT * FROM content WHERE id = $searchId;";
         $res = $this->db->executeFetchAll($sql);
         //$this->db = $db;
         $this->id = $res[0]->id;
         $this->path = $res[0]->path;
         $this->slug = $res[0]->slug;
         $this->title = $res[0]->title;

         $this->type = $res[0]->type;
         $this->filter = $res[0]->filter;
         $this->published = $res[0]->published;
         $this->data = $this->textfilter->parse($res[0]->data, [$this->filter]);

         return $this;
    }
}
