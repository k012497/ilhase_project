<?php
function create_table($conn, $table_name){
    $table_exists = false; // 테이블의 존재 유무
    $sql = "show tables from ilhase";
    $result = mysqli_query($conn, $sql) or die('Error: ' . mysqli_error($conn));

    while ($row = mysqli_fetch_row($result)) {
        if($row[0] === "$table_name"){
          $table_exists = true;
          break;
        }
    }
    
    // 테이블이 존재하지 않는 경우, 테이블 생성
    if (!$table_exists) {
        switch ($table_name) {
            case 'address' :
                $sql = "CREATE TABLE `address` (
                    `num` smallint(6) NOT NULL AUTO_INCREMENT,
                    `si_do` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `si_gun_gu` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    PRIMARY KEY (`num`)
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
                break;

            case 'admin' :
                $sql = "CREATE TABLE `admin` (
                    `id` char(5) COLLATE utf8mb4_general_ci NOT NULL,
                    `pw` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
                    PRIMARY KEY (`id`)
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
                break;

            case 'apply' :
                $sql = "CREATE TABLE `apply` (
                    `num` int(11) NOT NULL AUTO_INCREMENT,
                    `resume_title` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
                    `recruit_id` int(11) NOT NULL,
                    `member_id` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
                    `regist_date` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
                    PRIMARY KEY (`num`)
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
                break;
                
            case 'corporate' :
                $sql = "CREATE TABLE `corporate` (
                  `id` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `pw` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `b_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `job_category` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `ceo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `b_license_num` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
                  `address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `available_service` varchar(10) COLLATE utf8mb4_general_ci DEFAULT '3',
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
                break;
                
            case 'favorite' :
                $sql = "CREATE TABLE `favorite` (
                    `num` int(11) NOT NULL AUTO_INCREMENT,
                    `recruit_id` int(11) NOT NULL,
                    `member_id` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
                    PRIMARY KEY (`num`),
                    KEY `fav_recruitment_id_fk` (`recruit_id`),
                    KEY `fav_member_id_fk` (`member_id`),
                    CONSTRAINT `fav_member_id_fk` FOREIGN KEY (`member_id`) REFERENCES `person` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                    CONSTRAINT `fav_recruitment_id_fk` FOREIGN KEY (`recruit_id`) REFERENCES `recruitment` (`num`) ON DELETE CASCADE ON UPDATE CASCADE
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
                break;
                
            case 'job_industry' :
                $sql = "CREATE TABLE `job_industry` (
                    `num` tinyint(4) NOT NULL AUTO_INCREMENT,
                    `category` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `section` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    PRIMARY KEY (`num`)
                  ) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
                break;

            case 'notice' :
                $sql = "CREATE TABLE `notice` (
                    `num` int(11) NOT NULL AUTO_INCREMENT,
                    `subject` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `file_name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                    `file_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                    `file_copied` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                    `hit` int(10) unsigned NOT NULL DEFAULT '0',
                    `regist_date` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    PRIMARY KEY (`num`)
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
                break;

            case 'notification' :
                $sql = "CREATE TABLE `notification` (
                    `num` int(11) NOT NULL AUTO_INCREMENT,
                    `title` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
                    `content` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
                    `regist_date` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
                    `read` tinyint(4) NOT NULL,
                    `member_id` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
                    PRIMARY KEY (`num`),
                    KEY `noti_member_id_fk` (`member_id`),
                    CONSTRAINT `noti_member_id_fk` FOREIGN KEY (`member_id`) REFERENCES `person` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
                break;

            case 'person' :
                $sql = "CREATE TABLE `person` (
                  `id` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `pw` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `birth` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `gender` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `zipcode` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
                  `new_address` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
                  `old_address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
                break;

            case 'purchase' :
                $sql = "CREATE TABLE `purchase` (
                    `num` int(11) NOT NULL AUTO_INCREMENT,
                    `date` char(20) COLLATE utf8mb4_general_ci NOT NULL,
                    `member_id` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
                    `plan_num` tinyint(3) NOT NULL,
                    `plan_name` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
                    `price` int(7) NOT NULL,
                    `method` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
                    PRIMARY KEY (`num`),
                    KEY `purchase_id_fk` (`member_id`),
                    CONSTRAINT `purchase_id_fk` FOREIGN KEY (`member_id`) REFERENCES `corporate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
                break;

            case 'qna' :
                $sql = "CREATE TABLE `qna` (
                    `num` int(11) NOT NULL AUTO_INCREMENT,
                    `group_num` int(10) unsigned NOT NULL,
                    `depth` int(10) unsigned NOT NULL,
                    `order` int(10) unsigned NOT NULL,
                    `id` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
                    `name` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
                    `subject` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
                    `content` text COLLATE utf8mb4_general_ci NOT NULL,
                    `hit` int(10) unsigned NOT NULL DEFAULT '0',
                    `regist_date` char(20) COLLATE utf8mb4_general_ci NOT NULL,
                    PRIMARY KEY (`num`)
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
                break;

            case 'recruitment' :
                $sql = "CREATE TABLE `recruitment` (
                  `num` int(11) NOT NULL AUTO_INCREMENT,
                  `corporate_id` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
                  `title` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `recruiter_name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `recruiter_phone` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `recruiter_email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                  `homepage` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                  `industry` varchar(22) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `personnel` tinyint(3) NOT NULL,
                  `require_career` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `require_edu` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `pay` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `recruit_type` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `period_start` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `period_end` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `work_place` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `file_name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                  `file_copied` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                  `regist_date` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  PRIMARY KEY (`num`),
                  KEY `recruitment_cid_fk` (`corporate_id`),
                  CONSTRAINT `recruitment_cid_fk` FOREIGN KEY (`corporate_id`) REFERENCES `corporate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
                ) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
                break;

            case 'recruit_plan' :
                $sql = "CREATE TABLE `recruit_plan` (
                    `num` int(11) NOT NULL AUTO_INCREMENT,
                    `name` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `description` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `price` int(7) NOT NULL,
                    PRIMARY KEY (`num`),
                    UNIQUE KEY `name` (`name`)
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
                break;

            case 'resume' :
                $sql = "CREATE TABLE `resume` (
                    `num` int(11) NOT NULL AUTO_INCREMENT,
                    `public` tinyint(1) NOT NULL,
                    `m_id` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `m_name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `m_email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `m_address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `m_gender` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `m_birthday` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `m_phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `title` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                    `cover_letter` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `career` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
                    `license` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
                    `education` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
                    `file_name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                    `file_copied` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                    `regist_date` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    PRIMARY KEY (`num`),
                    KEY `m_id` (`m_id`),
                    CONSTRAINT `resume_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `person` (`id`)
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";
                break;

            default :
                // 필요하지 않은 테이블명일 때 생성하지 않음
                $sql = "";
                break;
        } // end of switch

        if(mysqli_query($conn,$sql)){
            // 테스트용
            // echo '<script >alert("'.$table_name.' 테이블이 생성되었습니다.");</script>';
        } else {
            echo "테이블 생성 실패! ".mysqli_error($conn);
        }
    } // end of if table doesn't exist

}