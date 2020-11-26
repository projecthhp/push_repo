<?
   include('../home/config.php');
   $userid = $_COOKIE["UID"];
   $userid = (int)replaceMQ(trim($userid));

   $use_job_name = getValue("use_job_name","str","POST","");
   $use_job_name = replaceMQ(trim($use_job_name));

   $work_option = getValue("work_option","int","POST","0");
   $level_desired = getValue("level_desired","str","POST","");
   $experience = getValue("experience","int","POST","");

   $job_city = getValue("job_city","arr","POST","");
   $job_city = implode(',', $job_city);

   $category = getValue("category","arr","POST","");
   $category = implode(',', $category);

   $money = getValue("money","int","POST","");

   $data = [
      'use_job_name'       => $use_job_name,
      'work_option'        => $work_option,
      'cap_bac_mong_muon'  => $level_desired,
      'exp_years'          => $experience,
      'salary'             => $money,
      'use_district_job'   => $job_city,
      'use_nganh_nghe'     => $category,
      'use_update_time'    => time()
   ];

   $condition = [
      'use_id' => $userid
   ];
   update('user',$data,$condition);
   redirect('/ung-vien/ho-so-online.html');
?>