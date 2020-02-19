<?php
$get_data = $_GET;



$shell_string = "curl -v -X POST https://kauth.kakao.com/oauth/token -d 'grant_type=authorization_code' -d 'client_id=b378be7369ce544cb17093e74b7fda46' -d 'redirect_uri=http://".$_SERVER['HTTP_HOST']."/oauth' -d 'code=".$get_data['code']."'";

$output = shell_exec($shell_string);

$token_json = json_decode($output, true);



$kakao_email_check = 0;
if (@!$token_json['access_token']) {
    echo "<script>alert('아이디 정보가 없습니다. 재시도 해주세요.');</script>";

    exit();
} else {
    $shell_string = "curl -v -X POST https://kapi.kakao.com/v2/user/me -H 'Authorization: Bearer ".$token_json['access_token']."' -d 'property_keys=[\"kakao_account.email\"]'";
}
$user_info = shell_exec($shell_string);



$user_info_json = json_decode($user_info, true);



if (!@$user_info_json['kakao_account']['email']) {
    $shell_string = "curl -v -X POST https://kapi.kakao.com/v1/user/unlink -H 'Authorization: Bearer ".$token_json['access_token']."'";
    shell_exec($shell_string);

    alert('필수 정보에 동의하지 않으셨습니다. 로그인을 재시도 해주세요.', '_login');
}

print_r($user_info_json);
 ?>
