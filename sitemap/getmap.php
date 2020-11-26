<? include("../home/config.php");  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
        $time = explode(" ",microtime());
        $time = $time[1];

        // include class
        include 'SitemapGenerator.php';
        // create object
        $sitemap = new SitemapGenerator("https://timviec365.com", "../");

        // will create also compressed (gzipped) sitemap
        $sitemap->createGZipFile = false;

        // determine how many urls should be put into one file
        $sitemap->maxURLsPerSitemap = 50000;

        // sitemap file name
        $sitemap->sitemapFileName = "sitemap.xml";

        // sitemap index file name
        $sitemap->sitemapIndexFileName = "sitemap.xml";

        // robots file name
        $sitemap->robotsFileName = "robots.txt";

        // Create connection
        $conn = new mysqli('localhost', 'viec365_usercom', 'ldmro7hWP', 'viec365_tv365com');
        $conn->set_charset('utf8');
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $urls = array(
            array("https://timviec365.com",   date('c'),  'daily',    '1'),        
        );
        $result = $conn->query('SELECT cit_id, cit_name FROM city');
        if($result->num_rows > 0) {     
            while($row = mysqli_fetch_object($result)) {
                $urls[] = array('https://timviec365.com'.rewriteCate($row->cit_id,$row->cit_name), date(c),  'daily',    '0.9');
            }                    
        } 
        $result = $conn->query('SELECT new_id, new_title, new_create_time FROM new');
        if($result->num_rows > 0) {     
            while($row = mysqli_fetch_object($result)) {
                $day = date('Y-m-d\TH:i:sP', strtotime($row->new_create_time));
                $urls[] = array('https://timviec365.com'.rewriteNews($row->new_id,$row->new_title), $day,  'daily',    '0.8');
            }                    
        } 
        $result = $conn->query('SELECT usc_create_time, usc_id, usc_company  FROM user_company');
        if($result->num_rows > 0) {     
            while($row = mysqli_fetch_object($result)) {
                $day = date('Y-m-d\TH:i:sP', strtotime($row->usc_create_time));
                $urls[] = array('https://timviec365.com'.rewrite_company($row->usc_id,$row->usc_company), $day,  'daily',    '0.8');
            }                    
        } 
       

        // add many URLs at one time
        $sitemap->addUrls($urls);        

        try {
            // create sitemap
            $sitemap->createSitemap();

            // write sitemap as file
            $sitemap->writeSitemap();

            // update robots.txt file
            $sitemap->updateRobots();

            // submit sitemaps to search engines
            //$result = $sitemap->submitSitemap("yahooAppId");
            // shows each search engine submitting status
            //echo "<pre>";
            //print_r($result);
            //echo "</pre>";   
        }
        catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        echo "Memory peak usage: ".number_format(memory_get_peak_usage()/(1024*1024),2)."MB";
        $time2 = explode(" ",microtime());
        $time2 = $time2[1];
        echo "<br>Execution time: ".number_format($time2-$time)."s";


        ?>
    </body>
</html>
