<?php
    header('Content-Type: text/html; charset=utf-8');	   
    
    function gindex(){
        //var_dump('expression');die;
        require_once 'simple_html_dom_helper.php';   
        $newtime = strtotime(date('d-m-Y'));

        $html = file_get_html('https://vieclam24h.vn/cam-nang-nghe-nghiep/chuyen-muc/cam-nang-tuyen-dung');
        $pattern = '.main-content';
        $pattern_bound = '.news';
        $abc_link = array();
        
        foreach($html->find($pattern) as $element){            
            foreach($element->find($pattern_bound) as $el){   
                $time = strtotime($el->find('.time',0)->plaintext);
                if($time==$newtime){       
                    $abc_link[]['title'] = $el->find('h2.title',0)->plaintext;                  
                    $abc_link[]['link'] = $el->find('h2.title a',0)->href;
                }         
            }            
        }
        $i=1;

        foreach ($abc_link as $link) {
            $i++;
            echo $link['title'].'<a href="'.$link['link'].'">'.$link['link'].'</a><br><br>';                
        }
        echo '<p>Tin tức lấy từ vieclam24h.vn ngày '.date('d/m/Y').': '.count($abc_link).' tin. Link: https://vieclam24h.vn/cam-nang-nghe-nghiep/chuyen-muc/cam-nang-tuyen-dung</p>';
        $html->clear();
        unset($html);
        ///////////
        $html = file_get_html('https://vieclam24h.vn/cam-nang-nghe-nghiep/chuyen-muc/cam-nang-tim-viec');
        $pattern = '.main-content';
        $pattern_bound = '.news';
        $abc_link = array();
        
        foreach($html->find($pattern) as $element){            
            foreach($element->find($pattern_bound) as $el){   
                $time = strtotime($el->find('.time',0)->plaintext);
                if($time==$newtime){       
                    $abc_link[]['title'] = $el->find('h2.title',0)->plaintext;                  
                    $abc_link[]['link'] = $el->find('h2.title a',0)->href;
                }         
            }            
        }
        $i=1;

        foreach ($abc_link as $link) {
            $i++;
            echo $link['title'].'<a href="'.$link['link'].'">'.$link['link'].'</a><br><br>';                
        }
        echo '<p>Tin tức lấy từ vieclam24h.vn ngày '.date('d/m/Y').': '.count($abc_link).' tin. Link: https://vieclam24h.vn/cam-nang-nghe-nghiep/chuyen-muc/cam-nang-tim-viec</p>';
        $html->clear();
        unset($html);

        foreach ($abc_link as $link) {
            $i++;
            echo $link['title'].'<a href="'.$link['link'].'">'.$link['link'].'</a><br><br>';                
        }
        echo '<p>Tin tức lấy từ vieclam24h.vn ngày '.date('d/m/Y').': '.count($abc_link).' tin. Link: https://vieclam24h.vn/cam-nang-nghe-nghiep/chuyen-muc/cam-nang-tuyen-dung</p>';
        $html->clear();
        unset($html);
        ///////////
        $html = file_get_html('https://vieclam24h.vn/cam-nang-nghe-nghiep/chuyen-muc/goc-chia-se');
        $pattern = '.main-content';
        $pattern_bound = '.news';
        $abc_link = array();
        
        foreach($html->find($pattern) as $element){            
            foreach($element->find($pattern_bound) as $el){   
                $time = strtotime($el->find('.time',0)->plaintext);
                if($time==$newtime){       
                    $abc_link[]['title'] = $el->find('h2.title',0)->plaintext;                  
                    $abc_link[]['link'] = $el->find('h2.title a',0)->href;
                }         
            }            
        }
        $i=1;

        foreach ($abc_link as $link) {
            $i++;
            echo $link['title'].'<a href="'.$link['link'].'">'.$link['link'].'</a><br><br>';                
        }
        echo '<p>Tin tức lấy từ vieclam24h.vn ngày '.date('d/m/Y').': '.count($abc_link).' tin. Link: https://vieclam24h.vn/cam-nang-nghe-nghiep/chuyen-muc/goc-chia-se</p>';
        $html->clear();
        unset($html);
    }
    gindex();
    
?>
