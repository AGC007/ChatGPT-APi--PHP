<?php
#~~~~~~~ ChatGPT API By AGC007 ~~~~~~~#

#---------------- Get Question --------------------#

if($_GET['Question'] != "" && $_GET['Type'] != "")
{
    $Question = $_GET['Question'];
    $Authorization = "*****";
     
    if($_GET['Type'] == "NormalMode")#Normal_ChatGPT
    {
      ChatGPT_NormalMode_API($Authorization , $Question);
    }

    elseif($_GET['Type'] == "No_NormalMode")#No_Normal_ChatGPT
    {
      ChatGPT_No_NormalMode_API($Authorization ,$Question);
    }
}

#---------------- Get Question --------------------#


#---------------- ChatGPT API Normal --------------------#

function ChatGPT_NormalMode_API($Authorization , $Question)
{
    $REQ = curl_init();
    curl_setopt_array(
      $REQ , 
    array(
      CURLOPT_URL => 'https://api.openai.com/v1/chat/completions',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>
      '{
          "model": "gpt-3.5-turbo",
          "messages": [{"role": "user", "content": "'.$Question.'"}],
          "temperature": 0.7,
          "max_tokens": 4000,
          "top_p": 1.0,
          "frequency_penalty": 0.0,
          "presence_penalty": 0.0
      }',

      CURLOPT_HTTPHEADER => array(
          'Authorization: Bearer '.$Authorization,
          'Content-Type: application/json'
  ),
 )
);
 
echo $Response = curl_exec($REQ);
curl_close($REQ);

}

#---------------- ChatGPT API Normal --------------------#


#---------------- ChatGPT API No Normal --------------------#

function ChatGPT_No_NormalMode_API($Authorization , $Question)
{
    $REQ = curl_init();
    curl_setopt_array(
      $REQ , 
    array(
      CURLOPT_URL => 'https://api.openai.com/v1/completions',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'
      {
        "model": "text-davinci-003",
        "prompt": "'.$Question.'",
        "temperature": 1,
        "max_tokens": 4000,
        "top_p": 1.0,
        "frequency_penalty": 0.0,
        "presence_penalty": 0.0
      }',

      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer '.$Authorization,
        'Content-Type: application/json'
    ),
  )
);
   
  echo $Response = curl_exec($REQ);
  curl_close($REQ);

}

#---------------- ChatGPT API No Normal --------------------#


#~~~~~~~ ChatGPT API By AGC007 ~~~~~~~#
?>