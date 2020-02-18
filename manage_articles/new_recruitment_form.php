<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <link rel="stylesheet" href="../common/css/common.css">
      <link rel="stylesheet" href="./css/recruiter.css">
      <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  </head>
  <body>
    <header>
      <?php include $_SERVER["DOCUMENT_ROOT"]."/ilhase/common/lib/header.php";?>
    </header>
    <form class="" action="index.html" method="post">
      <div id="div_main">
        <div class="title">
          <h3 id="recruiter_title">신규 공고 등록</h3>
        </div>
        <div class="title">
          <h3 id="recruiter_info">step1. 담당자 정보</h3>
        </div>
        <div id="div_recruiter_info">
          <div id="recruiter_first">
            <div id="div_recruiter_name">
              <p>채용 담당자 명<strong>*</strong></p>
              <input type="text" id="recruiter_name" name="recruiter_name" placeholder="이름">
            </div>
            <div id="div_recruiter_phone">
              <p>전화 번호<strong>*</strong></p>
              <input id="recruiter_phone"type="text" name="recruiter_phone"
              placeholder="전화 번호">
            </div>
          </div>
          <div id="recruiter_second">
            <div id="div_recruiter_email">
              <p>이메일</p>
              <input type="text"id="recruiter_email" name="recruiter_email">
            </div>
            <div id="div_recruiter_homepage">
              <p>홈페이지</p>
              <input type="text" id="recruiter_homepage"name="recruite r_homepage">
            </div>
          </div>
        </div>
        <div class="title">
          <h3 id="div_recruit_info">step2.구인 정보</h3>
        </div>
        <div id="div_industry">
          <p>산업 분류<strong>*</strong></p>
          <div id="div_category">
            <select id="category_select" size="1"name="select">
              <option value="생산/제조/단순노무">생산/제조/단순노무</option>
              <option value="경비/시설관리">경비/시설관리</option>
              <option value="청소/미화">청소/미화</option>
              <option value="도우미">도우미</option>
              <option value="음식점/마트/주유">음식점/마트/주유</option>
              <option value="배달/운전/택배">배달/운전/택배</option>
              <option value="안내/접수/상담">안내/접수/상담</option>
              <option value="공공전문">공공/전문</option>
              <option value="취업창업형(시장형)">취업창업형(시장형)</option>
            </select>
          </div>
          <div id="industry_detail">
            <select id="select_section" size="1" name="section">
              <option value="">선택 없음</option>
            </select>
          </div>
          <div id="div_career">
            <div id="div_personnel">
              <p>모집 인원<strong>*</strong></p>
              <input type="number" name="personnel" value="00">명
            </div>
            <div id="div_require_career">
              <p>지원 자격<strong>*</strong></p>
                경력<input id="career" type="number" name="require" placeholder="00">년 이상 <input id="unrelate" type="checkbox" name="require_check" value="">무관
                <select id="edu_select" size="1" name="edu_select">
                  <option value="학력">학력</option>
                  <option value="무관">무관</option>
                  <option value="고졸 이상">고졸 이상</option>
                  <option value="대졸 이상">대졸 이상</option>
                  <option value="석/박사">석/박사</option>
                </select>
            </div>
          </div>
        <div id="div_pay">
          <p>급여<strong>*</strong></p>
        <div id="input_pay">
          <input type="number" id="pay" name="pay" placeholder="급여">원
          <input type="radio" id="hour_pay" name="hour_pay" value="시급">시급
          <input type="radio" id="month_pay" name="month_pay" value="월급">월급
          <input type="radio" id="year_pay" name="year_pay" value="연봉">연봉
        </div>
          </div>
        <div id="div_recruit_type">
          <p>고용 형태<strong>*</strong></p>
        <div id="recruit_type">
          <input type="radio"  name="type1" value="시급제">시급제
          <input type="radio"  name="type2" value="계약직">계약직
          <input type="radio"  name="type3" value="정규직">정규직
          <input type="radio"  name="type4" value="기타">기타
        </div>
          </div>
        <div id="div_period">
          <p>모집 기간<strong>*</strong></p>
        <div id="period">
          <input type="text" id="period_start" name="period_start" placeholder="접수 시작일" onfocus="(this.type='date')"> ~ <input type="text" id="period_end" name="period_end" placeholder="접수 마감일" onfocus="(this.type='date')">
        </div>
        </div>
        <div id="div_workplace">
          <p>근무지<strong>*</strong></p>
        <div id="workplace">
          <input type="text" id="text_work" name="text_work" placeholder="OO시 OO구 OO동 OO빌딩 4~5층">
        </div>
        </div>
      </div>
      <div class="title">
        <h3>step3.상세요강</h3>
      </div>
      <div id="div_recruit_title">
        <p>제목<strong>*</strong></p>
        <div id="div_title">
          <input type="text" id="recruit_title" name="recruit_title" placeholder="제목">
        </div>
      <div id="div_corporate_detail">
        <p>저희는 이런 회사예요</p>
        <textarea name="corporate_detail" rows="7" cols="75" placeholder="어떤 일을 하는 곳인가요 ?" style="resize: none;"></textarea>
      </div>
      <div id="div_person_detail">
        <p>이런 사람 원해요</p>
        <textarea name="person_detail" rows="7" cols="75" placeholder="특별히 원하는 인재상을 알려주세요." style="resize: none;"></textarea>
      </div>
      <div id="div_environment_detail">
        <p>이런 환경에서 일해요</p>
        <textarea name="environment_detail" rows="7" cols="75" placeholder="구체적인 업무, 근무 시간, 근무 장소,주의할 점 등에 대해 알려주세요." style="resize: none;"></textarea>
      </div>
      <div id="div_image_upload">
        <p>사진 업로드</p>
        <button type="button" name="button"> <img src="../img/plus.png" alt=""> </button>
      </div>
      </div>
      <div id="div_btn_regist">
          <button type="button" name="btn_regist" value="등록하기">등록하기</button>
      </div>
    </div>

  </form>
  </body>
</html>
