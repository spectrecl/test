<?php 



		$postdata = '
{
 "token": "fa1a41b27a87e319c26d06caca333ebc",
 "task": {
            "kind":"1",
            "title":"SOME TITLE",
            "url":"https://vk.com/ilvreke?z=photo120588778_456257453%2Fphotos120588778",
            "members_count":"111",
            "cost":"1",
            "tag_list":"tag1, tag2",
            "sex":"2",
            "age_min":"11",
            "age_max":"22",
            "friends_count":"33",
            "country":"1",
            "city_text":"Москва",
            "city":"1",
            "has_avatar":"1"
          },
  "task_limit": {
                 "minute_1":"1",
                 "minutes_5":"2",
                 "hour_1":"3",
                 "hours_4":"4",
                 "day_1":"5"}
  }
';

 // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "https://like4u.ru/tasks.json"); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        // $output contains the output string 
        $output = curl_exec($ch); 

        // close curl resource to free up system resources 
        curl_close($ch); 
		$obj=json_decode($output);
		$apid = $obj->id;
		$err = $obj->error;

		if(isset($err) || !isset($apid)) {
			echo '{"error":"'.$err.'"}';
		} else {
		echo '{"order":"'.$apid.'"}';
		}



 ?>
