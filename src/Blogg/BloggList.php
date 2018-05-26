<?php
namespace peje17\Blogg;

/**
* Blogg list class to handle a list of blogg entries
*/
class BloggList
{
    /**
     * @var Database database object
     * @var array array of blog entries
     */
    private $db;
    private $blogglistarray;



    /**
     * Constructor to initiate a list of bloggs from input database
     *
     * @param Database database object to query
     */
    public function __construct($db)
    {
        $this->db  = $db;
    }

    /**
     * Function to get all blogg entries
     *
     */
    public function getAll()
    {
        $sql = "SELECT * FROM content WHERE deleted >= NOW() OR deleted IS NULL;";
        $res = $this->db->executeFetchAll($sql);
        return $res;
    }

    /**
     * Function to get all blogg entries
     *
     */
    public function getDeltedAll()
    {
        $sql = "SELECT * FROM content;";
        $res = $this->db->executeFetchAll($sql);
        return $res;
    }

    /**
     * Function to reset
     *
     */
    public function resetDB()
    {
        $sql = "DROP TABLE IF EXISTS content;";
        $this->db->execute($sql);
        $sql = <<<EOD
        CREATE TABLE content
        (
          id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
          path CHAR(120) UNIQUE,
          slug CHAR(120) UNIQUE,
          title VARCHAR(120),
          data TEXT,
          type CHAR(20),
          filter VARCHAR(80) DEFAULT NULL,
          published DATETIME DEFAULT CURRENT_TIMESTAMP,
          created DATETIME DEFAULT CURRENT_TIMESTAMP,
          updated DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
          deleted DATETIME DEFAULT NULL
        ) ENGINE INNODB CHARACTER SET utf8 COLLATE utf8_swedish_ci;
EOD;
        $this->db->execute($sql);
        $sql = "TRUNCATE content;";
        $this->db->execute($sql);
        $sql = <<<EOD
            INSERT INTO content (path, slug, type, title, data, filter) VALUES
            ("hem", null, "page", "Hem", "Detta är min hemsida. Den är skriven i [url=http://en.wikipedia.org/wiki/BBCode]bbcode[/url] vilket innebär att man kan formattera texten
            till [b]bold[/b] och [i]kursiv stil[/i] samt hantera länkar.\n\nDessutom finns ett filter 'nl2br' som lägger in <br>-element istället för \\n, det är smidigt, man kan
            skriva texten precis som man tänker sig att den skall visas, med radbrytningar.", "bbcode"),
            ("om", null, "page", "Om", "Detta är en sida om mig och min webbplats. Den är skriven i [Markdown](http://en.wikipedia.org/wiki/Markdown). Markdown innebär att du får
            bra kontroll över innehållet i din sida, du kan formattera och sätta rubriker, men du behöver inte bry dig om HTML.\n\nRubrik nivå 2\n-------------\n\nDu skriver enkla
            styrtecken för att formattera texten som **fetstil** och *kursiv*. Det finns ett speciellt sätt att länka, skapa tabeller och så vidare.\n\n###Rubrik nivå 3\n\nNär man
            skriver i markdown så blir det läsbart även som textfil och det är lite av tanken med markdown.", "markdown"),
            ("blogpost-1", "valkommen-till-min-blogg", "post", "Välkommen till min blogg!", "Detta är en bloggpost.\n\nNär det finns länkar till andra webbplatser så kommer de
            länkarna att bli klickbara.\n\nhttp://dbwebb.se är ett exempel på en länk som blir klickbar.", "link"),
            ("blogpost-2", "nu-har-sommaren-kommit", "post", "Nu har sommaren kommit", "Detta är en bloggpost som berättar att sommaren har kommit, ett budskap som kräver en bloggpost.", "nl2br"),
            ("blogpost-3", "nu-har-hosten-kommit", "post", "Nu har hösten kommit", "Detta är en bloggpost som berättar att sommaren har kommit, ett budskap som kräver en bloggpost", "nl2br");
EOD;
        $this->db->execute($sql);
        return true;
    }



    /**
     * Function to get all pages
     *
     */
    public function getPages()
    {
        $sql = "SELECT * FROM content WHERE type='page';;";
        $res = $this->db->executeFetchAll($sql);
        return $res;
    }



    /**
     * Function to get all posts
     *
     */
    public function getPosts()
    {
        $sql = "SELECT * FROM content WHERE type='post';;";
        $res = $this->db->executeFetchAll($sql);
        return $res;
    }



    /**
     * Function to sort blogg entries
     *
     */
    public function sort()
    {
    }



    /**
     * Function to filter blogg entries
     *
     */
    public function filter()
    {
    }
}
