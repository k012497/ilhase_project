var naverLogin = new naver.LoginWithNaverId(
  {
    clientId: "NQzYhgZ1ajZ0m1J4T9Fv",
    callbackUrl: "http://localhost/ilhase/common/member_page/naver_login.php",
    isPopup: false, /* 팝업을 통한 연동처리 여부 */
    loginButton: {color: "green", type: 3, height: 60} /* 로그인 버튼의 타입을 지정 */
  }
);

/* 설정정보를 초기화하고 연동을 준비 */
naverLogin.init();

Kakao.init('92f268bc75efac2d4885645ade5700e6');

  Kakao.Auth.loginForm({
     success: function(authObj) {
     Kakao.API.request({
        url: '/v2/user/me',
        success: function(res) {
             $("#id").val(JSON.stringify(res.id));
             $("#name").val(JSON.stringify(res.properties.nickname));
             $("#email").val(JSON.stringify(res.kaccount_email));
             console.log(JSON.stringify(res.id));
             console.log(JSON.stringify(res.properties.nickname));
             console.log(JSON.stringify(res.kaccount_email));
             console.log(JSON.stringify(res.kakao_account.email));
             console.log(JSON.stringify(res.kakao_account.is_email_verified));
             // document.member_form.submit();
        },
        fail: function(error) {
          alert(JSON.stringify(error))
        }
      });
      },
   fail: function(err) {
   }
  });
