<?php
sleep(0);

ini_set("display_errors","On");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

//var_dump($_REQUEST);

$topic=$_REQUEST["topic"];
$tone=$_REQUEST["tone"];
$platform="LinkedIn";
//var_dump($tone);

if (empty($tone)) $tone="None";

if ($tone=="None")
    $tone="don't use any tone or voice or posting style";
else
   $tone=" pretend writing as - ".$tone;

if($_REQUEST["hashtags"]=="yes")
  $include_hastags="include hashtags ";
else
  $include_hastags="don't include hashtags";

if($_REQUEST["emoji"]=="yes")
  $include_emoji="include emoji ";
else
  $include_emoji="don't include emoji";

$prompt = "create social media post for ".$platform." post on topic - ".$topic.", ".$tone.", ".$include_hastags.", ".$include_emoji;

// echo $prompt; die();

/*
echo'**5 Digital Marketing Trends to Elevate Your Strategy in 2024 📈**

In the ever-evolving digital landscape, staying ahead of the curve is crucial. Check out these key trends that are set to shape the future of marketing:

1. **AI-Driven Personalization 🤖:** AI algorithms will empower brands to create highly tailored experiences for individual customers.

2. **Video Marketing Dominance 🎥:** Video content continues to reign supreme, with short-form videos (like Reels and TikTok) becoming increasingly popular.

3. **Interactivity and Engagement 🤝:** Interactive content, such as polls, quizzes, and AR experiences, will foster deeper connections with audiences.

4. **Data Privacy and Regulation 🔒:** As consumers become more aware of data privacy, businesses must prioritize transparency and ethical data collection practices.

5. **Experiential Marketing  Immersive:** Brands will focus on creating memorable and interactive experiences that immerse consumers in their products or services.

Stay tuned for our upcoming blog post where we will delve into each trend in detail. By embracing these innovations, you can enhance your digital marketing strategy and drive exceptional results.';
*/

GetSocialMediaPost($prompt);

die();

function GetSocialMediaPost($prompt)
{

$api_key = "";
$url = "https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key={$api_key}";

$data = array(
  "contents" => array(
      array(
          "role" => "user",
          "parts" => array(
             array(
                  "text" => $prompt
              )
          )
      )
  )
);

    $json_data = json_encode($data);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    curl_setopt($ch, CURLOPT_TIMEOUT, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    
    curl_close($ch);
    if(curl_errno($ch)) {
         echo 'Curl error: ' . curl_error($ch);
    }

    //echo $response;

    $json = json_decode($response);

    $social_post = $json->candidates[0]->content->parts[0]->text;

    curl_close($ch);
    echo $social_post;

}
?>
