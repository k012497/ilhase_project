<?php
define('ADMIN_ID', 'admin');
define('ADMIN_PW', '123456');

function insert_init_data($conn, $table_name){
    $is_empty = false; // 테이블이 비어 있는 지 유무
    $sql = "SELECT * from $table_name";
    $result = mysqli_query($conn, $sql) or die('select from table error: '.mysqli_error($conn));

    $records = mysqli_num_rows($result);

    if(empty($records) ){
      $is_empty = true;
    }

    // 테이블이 비어 있을 경우, 초기값을 넣어줌
    if($is_empty){
        switch($table_name){
            // 모든 테이블에 대한 초기값
            case 'admin' :
                $sql = "insert into `admin` values ('".ADMIN_ID."', '".ADMIN_PW."')";
                break;
                
            case 'person' :
                $sql = "insert into `person` values ('4jo4jo', '123123', '김사조', '1968-01-01', 'example@test.com', '010-1234-5678', '여', '51354', '서울 성동구 행당동 286-16', '서울 성동구 무학봉28길 11'),
                    ('ksj123', '123123', '김소진', '1959-07-01', 'example@test.com', '010-1124-4433', '여', '51354', '서울 성동구 행당동 286-16', '서울 성동구 무학봉28길 11'),
                    ('lcm123', '123123', '임채민', '1959-06-01', 'example@test.com', '010-2354-9785', '남', '51354', '서울 성동구 행당동 286-16', '서울 성동구 무학봉28길 11'),
                    ('nch123', '123123', '남채현', '1959-05-01', 'example@test.com', '010-4135-4233', '여', '51354', '서울 성동구 행당동 286-16', '서울 성동구 무학봉28길 11'),
                    ('lkh123', '123123', '이강현', '1959-05-01', 'example@test.com', '010-6244-4433', '남', '51354', '서울 성동구 행당동 286-16', '서울 성동구 무학봉28길 11'),
                    ('lts123', '123123', '이태성', '1959-02-01', 'example@test.com', '010-1531-3576', '남', '51354', '서울 성동구 행당동 286-16', '서울 성동구 무학봉28길 11'),

                    ('test12', '123123', '김테스트', '1959-01-01', 'example@test.com', '010-1124-4433', '여', '51354', '서울 성동구 행당동 286-16', '서울 성동구 무학봉28길 11'),
                    ('fruit', '123123', '김과일', '1968-07-01', 'example@test.com', '010-9928-8894', '여', '24243', '서울 성동구 행당동 286-16', '서울 성동구 무학봉28길 11'),
                    ('mnmnm', '123123', '김엠앤', '1967-08-01', 'example@test.com', '010-1234-5253', '남', '14243', '서울 성동구 행당동 286-16', '서울 성동구 무학봉28길 11'),
                    ('kamill', '123123', '김카밀', '1966-09-01', 'example@test.com', '010-9933-5678', '남', '24243', '서울 성동구 행당동 286-16', '서울 성동구 무학봉28길 11')
                    
                    ,('ator', 'jybu', 'Mosciski', '1960-03-25', 'marshall.rippin@example.net', '413-454-6426', '여', '26177', '77465 Anabelle Run Suite 193', '10609 Barbara Harbor Suite 967')
                    ,('aabb', 'wtei', 'Weissnat', '1960-03-25', 'creichel@example.net', '00270569739', '여', '51082', '15177 Nolan Gateway', '15433 Cale Shores')
                    ,('bfib', 'ujvb', 'Windler', '1949-04-25', 'kristina43@example.org', '(924)348-5699', '여', '58362', '3268 Glenna Squares', '35012 Langworth Path')
                    ,('bojq', 'plfb', 'Abbott', '1949-04-25', 'scummings@example.org', '113.180.5260', '여', '34984', '051 Retta Dam', '39581 DuBuque Union Apt. 759')
                    ,('bula', 'pfct', 'Kihn', '1960-03-25', 'pwelch@example.org', '1-596-278-5893', '여', '11053', '2730 Reva Glens', '1448 Annalise Trail Suite 618')
                    ,('bwpd', 'zgge', 'Jones', '1949-04-25', 'hkling@example.org', '(850)690-2820', '여', '48482', '663 Ivy Bypass', '424 Michaela Walk')
                    ,('cpfy', 'xvvp', 'Parker', '1949-04-25', 'arielle24@example.org', '172.629.5124', '여', '18040', '249 Filiberto Grove', '495 Bradtke Hollow')
                    ,('cwby', 'uezo', 'Macejkovic', '1949-04-25', 'eblock@example.com', '1-238-125-4900', '여', '35141', '50430 Lind Walk', '8569 Bauch Vista')
                    ,('dato', 'drkt', 'Frami', '1960-03-25', 'twhite@example.net', '433.515.1249x623', '여', '47628', '93297 Liza Light Suite 863', '4080 Foster Grove')
                    ,('eegh', 'puzh', 'D\'Amore', '1949-04-25', 'godfrey11@example.net', '03755887163', '여', '10279', '1905 Raynor Crossing Suite 209', '5482 Dickens Squares Apt. 186')
                    ,('efca', 'dxyh', 'Corwin', '1949-04-25', 'hilll.millie@example.com', '(957)214-1843', '여', '25691', '93644 Rita Trafficway', '46617 Smith Pines')
                    ,('ehww', 'vfob', 'Weissnat', '1949-04-25', 'jayda.kuhn@example.com', '+72(7)4474726307', '여', '47468', '4405 Hauck Pine Suite 667', '05995 Stroman Cove')
                    ,('erzz', 'gxeb', 'Ratke', '1949-04-25', 'ritchie.esteban@example.com', '489.661.2346x688', '여', '24252', '86651 Nicole Way', '84693 Romaguera Green Apt. 793')
                    ,('eyhf', 'ndba', 'Mueller', '1960-03-25', 'rohan.lavina@example.com', '536-727-9188x5194', '여', '29964', '8504 Danial Land Apt. 077', '709 Alexis Spur Suite 193')
                    ,('fagq', 'duem', 'Collins', '1949-04-25', 'novella.nader@example.org', '(873)233-6806', '여', '57957', '7431 Jayden Harbors Suite 563', '189 Bogan Mews Suite 641')
                    ,('gied', 'ouec', 'Hauck', '1960-03-25', 'lakin.kurt@example.net', '417.030.5477', '남', '49932', '447 Raymond Divide', '4146 Juston Gardens Suite 456')
                    ,('gkks', 'fwkx', 'Kreiger', '1949-04-25', 'naomie65@example.com', '526.291.1935', '남', '57444', '02038 Rempel Ways Apt. 195', '527 Kohler Springs')
                    ,('gkut', 'xvcu', 'Cassin', '1949-04-25', 'mcollins@example.org', '+35(084619974', '남', '16523', '852 Warren Field Apt. 950', '289 Lynch Track Apt. 899')
                    ,('gmna', 'joes', 'Stracke', '1949-04-25', 'wlarson@example.com', '178-716-8470', '남', '34530', '1942 Hodkiewicz Circle Suite 168', '5717 Wiza Fields')
                    ,('hgnj', 'fqga', 'Fay', '1949-04-25', 'larkin.sophia@example.net', '486.179.314', '남', '57996', '293 Macejkovic Freeway Suite 600', '6040 Justen Parks')
                    ,('hmze', 'fuwh', 'Wuckert', '1949-04-25', 'uheathcote@example.net', '526.652.01150', '남', '59914', '7240 Rebekah Creek', '8718 Conn Green Apt. 112')
                    ,('hqzc', 'hhdr', 'Hauck', '1949-04-25', 'maggio.earnest@example.org', '1-007-163-266', '남', '13705', '9540 Aaron Crossing', '75809 Christine Island Suite 697')
                    ,('hraf', 'ykrk', 'Feil', '1960-03-25', 'nigel39@example.net', '1-754-319]150', '남', '45078', '0943 Treutel Manor', '13291 Dooley Parks')
                    ,('ibpg', 'lkkn', 'Hartmann', '1949-04-25', 'pearlie.kulas@example.com', '(260)294-8703', '남', '43750', '551 Avery Union Suite 823', '0677 Abbott Valleys')
                    ,('ihiy', 'cxpn', 'O\'Reilly', '1949-04-25', 'konopelski.jacynthe@example.co', '(130)909-030', '남', '23247', '9523 Elena Camp Apt. 981', '5449 Gaetano Unions Suite 392')
                    ,('iraa', 'nmuc', 'Gleason', '1949-04-25', 'orie00@example.com', '506.156.204', '남', '23892', '7582 Blanda Mountain', '4762 Edwin Drive')
                    ,('isvh', 'rilr', 'Funk', '1949-04-25', 'maggio.arlie@example.org', '1-174-088-8903', '남', '23949', '90071 Padberg Lock', '768 Alaina Radial Suite 018')
                    ,('ivag', 'kxyv', 'Willms', '1949-04-25', 'remington.lakin@example.net', '338-738-4798', '여', '16321', '86750 Kris Fork Apt. 212', '6953 Shanahan Manor Apt. 176')
                    ,('jdtj', 'opej', 'Treutel', '1949-04-25', 'rice.aliyah@example.org', '1-463-]126', '여', '54341', '9397 Mueller Roads Apt. 280', '39827 Klein Crossing Apt. 918')
                    ,('jhpk', 'odoo', 'Beer', '1949-04-25', 'ifisher@example.com', '1-011-467-4', '여', '32797', '6843 Heathcote Forks Apt. 329', '275 Klocko Lights Apt. 540')
                    ,('jmap', 'kvso', 'Hackett', '1949-04-25', 'bd\'amore@example.net', '(531)096-7260', '여', '29406', '03160 Schuppe Meadows Suite 160', '82710 Mraz Summit')
                    ,('jnvg', 'rdnk', 'Wisoky', '1949-04-25', 'bartell.dolores@example.org', '1-348-83102', '여', '45181', '16585 Aida Mountains', '3866 Abdullah Landing')
                    ,('jwxr', 'vmpc', 'Altenwerth', '1960-03-25', 'ywitting@example.org', '890.231.2650', '여', '39496', '205 Denesik Union Apt. 395', '9743 Parker Heights')
                    ,('kkuw', 'rwst', 'Bashirian', '1949-04-25', 'langosh.cristobal@example.org', '+7]6626277', '여', '16202', '19758 Auer Dale Apt. 736', '69364 Cormier Island')
                    ,('kqfy', 'qkdm', 'Marvin', '1960-03-25', 'jmclaughlin@example.com', '1-801-383-65710', '여', '14377', '602 Schroeder Walks Suite 688', '5598 Cronin Flats Suite 522')
                    ,('kxvg', 'tmvu', 'Homenick', '1949-04-25', 'rpaucek@example.net', '1-422-600-88782', '여', '50850', '983 Hipolito Mews', '4275 Deckow Summit Apt. 604')
                    ,('lbry', 'vjjw', 'Walsh', '1949-04-25', 'ruecker.brooklyn@example.com', '(237)747-694', '여', '21237', '5192 Herman Walks Suite 419', '064 Esperanza Points Suite 278')
                    ,('lhbh', 'vpzg', 'Crooks', '1949-04-25', 'esteban00@example.com', '682-967-3020', '여', '43200', '1615 Rebeca Crossing Apt. 241', '64110 Oberbrunner Meadows Suite 317')
                    ,('lrtm', 'wqgg', 'Franecki', '1949-04-25', 'hahn.colin@example.net', '128-719-013', '여', '22509', '013 Jaiden Lights', '9299 Turcotte Trafficway')
                    ,('lzes', 'wutd', 'Terry', '1960-03-25', 'kianna31@example.com', '630-909-4942', '여', '35424', '53142 Lenore Spring', '95878 Curt Shoals')
                    ,('lzsd', 'hlev', 'Kuhic', '1949-04-25', 'rowland.boyle@example.net', '972.125.7601', '여', '27370', '086 Brielle Shoals Suite 860', '492 Jayne Crossroad')
                    ,('mrwi', 'dmwu', 'Bayer', '1960-03-25', 'vnienow@example.com', '909.391.0785', '여', '38856', '66342 Constantin Plains Apt. 185', '1506 Vern Prairie')
                    ,('nbcs', 'ymen', 'Lynch', '1949-04-25', 'cremin.ross@example.org', '063.292.51643', '남', '17252', '0863 Okuneva Island Apt. 110', '6380 Gerhold Drives')
                    ,('ndvw', 'iusp', 'Herzog', '1949-04-25', 'vergie.stroman@example.org', '134-443-8214', '남', '21498', '670 Schaden Lakes', '880 Ernser Manors')
                    ,('nqhd', 'tfkt', 'Gutkowski', '1949-04-25', 'annamarie21@example.com', '640.741.4131', '남', '34885', '258 Jalon Cliff', '1009 Herman Alley')
                    ,('nukc', 'qmlk', 'Oberbrunne', '1960-03-25', 'estel.leuschke@example.com', '1-45186', '남', '25433', '035 Lindsey Walks Suite 699', '289 Eulah Greens')
                    ,('ofap', 'vafi', 'Boehm', '1949-04-25', 'cronin.buck@example.net', '+38(6)4766032659', '남', '49142', '640 Cindy Path Apt. 215', '07672 Fanny Causeway')
                    ,('ozxc', 'ihad', 'Rice', '1960-03-25', 'schiller.valerie@example.net', '+83(8)5918]21', '남', '47256', '15285 Salma Fields Apt. 867', '3174 Mitchell Centers Suite 645')
                    ,('parx', 'oukg', 'Lakin', '1960-03-25', 'mallie96@example.net', '253.354.5969x46626', '남', '11201', '32010 Flatley Garden Apt. 995', '911 Kelly Park Suite 440')
                    ,('pbfo', 'xuhx', 'Senger', '1960-03-25', 'karine.jast@example.org', '1-688-469-21]18', '남', '47441', '530 Toy Mount', '888 Bartholome River Suite 504')
                    ,('phpu', 'qjze', 'Klein', '1949-04-25', 'esta.dibbert@example.org', '09392265802', '남', '54940', '273 Jermaine Burg Suite 588', '0830 Gaylord Tunnel')
                    ,('pidm', 'wazz', 'Kilback', '1949-04-25', 'jeramie86@example.net', '829.474.9394', '남', '27628', '807 Earlene Freeway Suite 729', '5723 Virginie Neck')
                    ,('pvck', 'eedk', 'Wuckert', '1949-04-25', 'joelle53@example.net', '(990)330-6]95', '남', '14459', '0728 Brice Union', '6477 Barton Flats')
                    ,('pvoh', 'hufd', 'Tremblay', '1949-04-25', 'hegmann.ernie@example.com', '1-080-159', '남', '24470', '353 Daniela Station', '045 Lorenzo Drive')
                    ,('pvzn', 'vjyy', 'Von', '1949-04-25', 'orpha.armstrong@example.com', '1-748-707-]81', '남', '40368', '26082 Andre Junctions', '1701 Yvette Dale')
                    ,('qfsa', 'iwmw', 'Nitzsche', '1949-04-25', 'hwolff@example.net', '1-270-85200', '남', '31811', '07963 Stroman Ford Apt. 526', '6460 Dylan Parkway Suite 260')
                    ,('qivh', 'giod', 'Kiehn', '1949-04-25', 'agusikowski@example.net', '849-300x738', '여', '53343', '09776 Coty Spring Apt. 357', '34488 Larkin Springs')
                    ,('qjlz', 'jtci', 'Graham', '1949-04-25', 'zswift@example.org', '1-694-131-4176', '여', '37458', '85394 Jadyn Trafficway Apt. 935', '3653 Charles Street Apt. 839')
                    ,('qrtz', 'ijmk', 'Konopelski', '1949-04-25', 'lambert33@example.com', '932.510.4521', '여', '26540', '32660 Ramona Trace', '3757 Aron Valley Suite 008')
                    ,('qubu', 'rvvu', 'Pfeffer', '1949-04-25', 'kristopher.toy@example.com', '(545)465-184', '여', '45243', '3750 Mabelle Lock Suite 473', '9012 Johns Shoals')
                    ,('rcaf', 'kxdr', 'Stroman', '1949-04-25', 'katarina.barton@example.com', '974.914.5428', '여', '30134', '9253 Jorge Springs', '5502 Lorenza Fork')
                    ,('rcce', 'hyzm', 'Upton', '1960-03-25', 'freinger@example.net', '569-030-45674', '여', '52955', '17920 Senger Haven Apt. 486', '7535 Prosacco Mountain')
                    ,('rcfj', 'wqid', 'Daniel', '1949-04-25', 'ludwig17@example.net', '1-401-925-6332', '여', '28849', '0458 Jast River', '74156 Dennis Skyway Apt. 681')
                    ,('rqem', 'kroc', 'McClure', '1949-04-25', 'funk.hazle@example.com', '068-889-8023', '여', '15212', '239 Bruce Shore', '11492 Katharina Underpass')
                    ,('sgwr', 'hejo', 'Mraz', '1949-04-25', 'dovie17@example.com', '05202549828', '여', '45103', '5108 Connelly Track Apt. 032', '961 Elmore Fields')
                    ,('smah', 'gbrn', 'Bechtelar', '1949-04-25', 'ojerde@example.org', '(490)116-2416', '여', '29441', '7002 Kautzer Haven Suite 605', '9441 Alden Light Apt. 486')
                    ,('snoq', 'clqx', 'Considine', '1960-03-25', 'kiera15@example.net', '(086)716-4375', '여', '38223', '203 Elliott Plain', '10609 Metz Spring Suite 335')
                    ,('suwt', 'owki', 'Murray', '1949-04-25', 'moore.breanne@example.net', '015-862-9162453', '여', '18455', '4387 Schmeler Estate Suite 100', '3180 Bogan Road')
                    ,('szbs', 'xnrw', 'Christians', '1949-04-25', 'lacey38@example.org', '(733)529-65', '여', '19281', '2338 Meagan Vista', '44300 Satterfield Rapid Apt. 297')
                    ,('teqj', 'ffov', 'Lang', '1960-03-25', 'johnnie.stroman@example.org', '893-605-7690', '여', '42640', '9807 Lorna Keys Apt. 761', '3533 Christy Passage Suite 829')
                    ,('timb', 'hsvj', 'Rowe', '1949-04-25', 'o\'conner.wilson@example.com', '221-841-951', '여', '46578', '509 Leola Summit Suite 979', '573 Lehner Park Apt. 467')
                    ,('tjjx', 'fute', 'Leannon', '1949-04-25', 'braun.jayde@example.net', '+26(1)3024390030', '여', '56453', '9898 Greenholt Springs', '49157 Frida Track')
                    ,('tlen', 'hkbn', 'Cole', '1949-04-25', 'geraldine39@example.org', '(945)235-0898', '여', '41111', '466 Von Pass', '94910 Abshire Pike Apt. 217')
                    ,('tmaf', 'usqp', 'Crona', '1949-04-25', 'mann.dahlia@example.net', '753-829-1734', '여', '15542', '604 Albin Station Apt. 581', '0061 Destany Point')
                    ,('toad', 'zjar', 'Zieme', '1949-04-25', 'dean78@example.net', '656.623.9507x67046', '여', '18653', '8437 Alba Shoals', '8673 Grant Walk Suite 618')
                    ,('tqjn', 'fqwk', 'Hegmann', '1949-04-25', 'connelly.lenny@example.com', '426-1575', '여', '38688', '69602 Paolo Meadows Apt. 269', '765 Williamson Union Suite 613')
                    ,('tyxy', 'rbrf', 'Bartell', '1960-03-25', 'ethan.balistreri@example.com', '487.133.2814', '여', '47925', '245 Langworth Plaza', '08664 Lia Plains Apt. 635')
                    ,('tzrp', 'qkev', 'Cruickshan', '1960-03-25', 'jdoyle@example.net', '131.456.14986', '여', '18371', '25876 Wilkinson Locks Suite 786', '4400 Spinka Lakes')
                    ,('uhsf', 'xfsb', 'Emmerich', '1949-04-25', 'tanya09@example.com', '117-749-40760', '여', '42370', '96547 Wisozk Pass Suite 305', '78489 Akeem Glens')
                    ,('uiis', 'izse', 'Jacobi', '1949-04-25', 'xlang@example.com', '414-781-2092', '여', '35444', '212 Wolff Court', '244 Mertz Plaza Apt. 833')
                    ,('ujei', 'flik', 'Bartell', '1949-04-25', 'hyman.hamill@example.org', '1-562-679-0113', '여', '40974', '93192 Lennie Forge Apt. 376', '8337 Savanna Overpass Apt. 347')
                    ,('usix', 'gllg', 'Trantow', '1949-04-25', 'reichert.celestine@example.net', '(987)206-1864', '여', '49973', '88909 Camille Port Apt. 799', '417 Wilderman Apt. 752')
                    ,('uszk', 'uemc', 'Kulas', '1960-03-25', 'marks.pedro@example.net', '(533)463-3943', '여', '20149', '919 Brycen Prairie Apt. 474', '6848 Smitham Cliff')
                    ,('vhmk', 'inul', 'Lindgren', '1949-04-25', 'lupe.casper@example.org', '(530)796-0805', '여', '27845', '8361 Rosenbaum Villages Apt. 746', '919 Raven Junction')
                    ,('vpns', 'bise', 'Walter', '1949-04-25', 'tanya54@example.com', '238-390-0389', '여', '22207', '4425 Coy Junction', '90065 Grady Orchard')
                    ,('wfms', 'jtve', 'Considine', '1949-04-25', 'urussel@example.net', '176-430-5945', '여', '31315', '481 Torp Isle', '0188 Bahringer Avenue Suite 293')
                    ,('xmxq', 'agza', 'Jerde', '1949-04-25', 'collins.louie@example.net', '267-144-0758', '여', '46632', '013 Luna Springs Apt. 577', '492 Summer Plain Suite 414')
                    ,('xpxx', 'aafr', 'Becker', '1949-04-25', 'pascale33@example.org', '644-758-0058x863', '여', '47699', '756 Alexis Station Apt. 206', '9781 Schaefer Street Suite 721')
                    ,('xrmy', 'buey', 'Schiller', '1949-04-25', 'kunze.brandon@example.com', '303-983-658', '여', '54025', '6493 Hickle Parkway Suite 754', '283 Odie Place Suite 315')
                    ,('xysu', 'mjkk', 'Kassulke', '1949-04-25', 'ricardo48@example.net', '044.995.0477', '여', '26622', '52982 Dare Shores Apt. 279', '1154 Hand Neck Suite 110')
                    ,('xzbr', 'loig', 'Wuckert', '1949-04-25', 'kuhic.conrad@example.com', '+33(24396', '여', '20540', '60632 Tanya Extensions Apt. 986', '582 Moen Roads Suite 304')
                    ,('ylpl', 'dwxy', 'Huel', '1949-04-25', 'eblick@example.org', '515.772.9318x23524', '여', '39978', '204 Howe Mews Apt. 155', '9666 Hills Fields Suite 587')
                    ,('yxui', 'eily', 'Welch', '1949-04-25', 'gboyer@example.org', '405.938.6138x6028', '여', '16248', '3066 Kuhn Valleys Apt. 402', '47976 Alexanne Roads Apt. 671')
                    ,('zecr', 'jkzs', 'Rodriguez', '1949-04-25', 'fkrajcik@example.net', '(491)658-3754', '여', '23351', '6679 Ziemann Pike', '051 Cheyanne Mall')
                    ,('zlav', 'wrav', 'Cruickshan', '1949-04-25', 'ukertzmann@example.org', '970-117187', '여', '37783', '16941 Kemmer Prairie', '36644 Rachael Highway')
                    ,('zsxi', 'hlbs', 'Pacocha', '1949-04-25', 'ajenkins@example.com', '1-949-997-8917', '여', '52376', '68661 Mertz Island Suite 939', '3097 Ciara Shores Apt. 445')
                    ,('ztgu', 'emvb', 'Windler', '1949-04-25', 'orpha.schultz@example.com', '623.606.1363', '여', '58015', '52844 Jacobi Dale', '62442 Bradly Squares')
                    ,('zzlz', 'oeny', 'Stroman', '1949-04-25', 'tito00@example.org', '(076)044-0929', '여', '19651', '082 Weimann Pike Suite 839', '22556 Dwight Motorway Apt. 890')
                    ,('zzrq', 'tbmj', 'Rosenbaum', '1949-04-25', 'moen.chelsey@example.net', '490-570-6353', '여', '36097', '5389 Icie Throughway Suite 453', '45354 Merle Neck Suite 870');
                    ";
                    
                break;

            case 'corporate' :
                $sql = "insert into `corporate` values ('chamchi', '123123', '사조참치', '제조업', '김소진', '1234512345', '서울 성동구 무학로2길 54', '4jo@company.com', '3'),
                    ('ilhase', '123123', '일하세', '교육/서비스업', '김소진', '2020021900', '서울 성동구 무학로2길 54', 'ilhase@company.com', '3'),
                    ('chocolate1', '123123', '가나콜릿', '제조업', '김소진', '3424343242', '서울 성동구 무학로2길 54', 'chocolate1@company.com', '3'),
                    ('celestial', '123123', '허벌티', '제조업', '김소진', '3012765544', '서울 성동구 무학로2길 54', 'celestial@company.com', '3'),
                    ('starbucks', '123123', '스타벅스', '숙박/음식업점', '김소진', '9955334400', '서울 성동구 무학로2길 54', 'starbucks@company.com', '3'),
                    ('mac123', '123123', '맥도날드', '숙박/음식업점', '김소진', '3349955003', '서울 성동구 무학로2길 54', 'mac123@company.com', '3')
                    
                    ,('albin', '4285', 'koelpin', '8', 'Angela', 'brekkehess', '60429 McClure OrGradyton, AK 93815', 'shyann74@example.org', '7')
                    ,('agoyette', '17', 'schmeler', '1', 'Norbert', 'damore', '6055 Wyatt Orchard SuitGrantberg, AK 18010', 'ondricka.shana@example.net', '3')
                    ,('albin41', '798048741', 'murphy', '2', 'Amelie', 'hirthehage', '02827 BlockHirtheshire, RI 86713', 'eschiller@example.com', '7')
                    ,('aletha54', '', 'wolfauer', '7', 'Arlo', 'boehmvolkm', '604 O\'Connell CTremblayburgh, IN 05838', 'eloisa.parisian@example.net', '6')
                    ,('allan54', '9704', 'schuppeboyle', '6', 'Adolph', 'lemkeohara', '15466 Yundt Parks SuitMantefurt, NM 34227-45', 'croberts@example.org', '8')
                    ,('allie92', '17', 'bailey', '5', 'Fleta', 'brekke', '150 Claude Ellieborough, MT 23330', 'yschowalter@example.net', '9')
                    ,('america90', '267', 'windler', '9', 'Darwin', 'kassulkemr', '38098 Susie Keys SuitLuishaven, DC 60188', 'acole@example.org', '3')
                    ,('andreane73', '5733', 'fritsch', '9', 'Freda', 'howeschamb', '83182 Liana Views SuitBergnaumshire, NE 7747', 'deion37@example.net', '9')
                    ,('aurore52', '23788', 'schuppe', '9', 'Judson', 'schneider', '7756 Gregorio Stravenue AptDakotashire, NV 1', 'temard@example.com', '6')
                    ,('barney70', '73601510', 'satterfield', '4', 'Esta', 'marksdaugh', '68836 LednerNorth Orvillebury, NV 10487-4861', 'zturcotte@example.org', '6')
                    ,('bartoletti', '', 'hintz', '4', 'Conrad', 'bernierjen', '20088 Kendra Forges AptSpencerhaven, NC 9440', 'spinka.conrad@example.com', '1')
                    ,('becker', '5428', 'von', '1', 'Abdul', 'sawayncrem', '7693 Eudora West Adalbertoton, VA 60550-9240', 'fadel.melba@example.org', '6')
                    ,('beeqlle', '2086789', 'medhurst', '1', 'Lacey', 'schuppe', '28959 Duncan Harbors SuitNew Oda, SC 36957', 'marisol.willms@example.net', '2')
                    ,('beriguez', '3441', 'funk', '4', 'Kade', 'pacochagre', '0738 ConnellyEast Louveniahaven, IA 82918-47', 'ilubowitz@example.com', '')
                    ,('bernieexand', '65326', 'hahn', '7', 'Tito', 'ziemannbot', '489 Jordyn South Janessa, NV 22420-6539', 'huel.reynold@example.net', '1')
                    ,('binssper', '4', 'abernathy', '1', 'Ashlynn', 'kovacekgol', '77630 Wyman Islands SuitWest Luisamouth, GA ', 'santino.schiller@example.com', '')
                    ,('binkary', '70905408', 'hoeger', '8', 'Hardy', 'keebler', '6169 Moore MEloymouth, IL 85419-9992', 'yheaney@example.com', '5')
                    ,('blittle', '997', 'senger', '7', 'Felix', 'stokes', '832 Carroll Turnpike AptBillstad, GA 67927-7', 'edwardo.borer@example.com', '')
                    ,('botsfordoty', '100881', 'romaguera', '1', 'Sven', 'simonis', '332 Hamill Flats AptWest Melanychester, CA 6', 'ozella17@example.net', '1')
                    ,('bradenradtke', '1659939', 'batzhintz', '3', 'Micaela', 'brown', '5930 HamillGaylordchester, OR 38011-8714', 'gregg47@example.org', '2')
                    ,('burniceley', '48015127', 'jacobi', '1', 'Dwight', 'walkerokun', '980 Bennie Pike AptWest Krista, NJ 92238-839', 'demario.lubowitz@example.com', '4')
                    ,('camdbbert', '699348', 'lednerthompson', '7', 'Garrick', 'strosin', '4224 Jerad Port Cale, TX 67969', 'boehm.skyla@example.com', '8')
                    ,('candelario88', '618848372', 'herzog', '6', 'Evie', 'gorczany', '8331 Willms Orchard SuitRiceland, ME 84911-5', 'willard.kihn@example.net', '9')
                    ,('cartely', '429404', 'keelingsteuber', '9', 'Hyman', 'kunzekris', '78020 AngelineLake Bartonhaven, MS 98924', 'wwaters@example.org', '3')
                    ,('caspkel', '28797577', 'swift', '3', 'Cade', 'connelly', '191 Farrell Course SuitLake Justus, WI 33236', 'fletcher.aufderhar@example.org', '9')
                    ,('cbatz', '5', 'kerluke', '1', 'Rico', 'botsfordly', '4856 Isaias TurNorth Eviebury, ND 14454-8069', 'ldietrich@example.com', '2')
                    ,('cbergnaum', '14', 'beier', '5', 'Joshuah', 'raynor', '11537 Rutherford AWinifredfurt, MI 36296', 'margarete29@example.com', '9')
                    ,('cdickens', '6377418', 'thompson', '2', 'Renee', 'homenick', '449 Abby Springs SuitCarolinaview, IA 47696-', 'breanne.fahey@example.com', '5')
                    ,('chancoore', '49', 'lind', '6', 'Lyla', 'zemlakluet', '708 Haag Walshhaven, NY 31673-3920', 'doyle.calista@example.org', '4')
                    ,('chatenwert', '79462', 'altenwerthschultz', '8', 'Makenzie', 'reichert', '83880 Deanna Haven AptMaziefurt, OR 01353', 'igorczany@example.org', '7')
                    ,('chesley59', '74443', 'batzhermann', '6', 'Brad', 'konopelski', '2640 Mann Lock AptKallieburgh, NC 04912', 'myles.mayert@example.net', '5')
                    ,('chris72', '37868', 'kiehn', '7', 'Crawford', 'rempeldeck', '221 Feest Club SuitZulaufstad, UT 02854-1895', 'eden.connelly@example.net', '7')
                    ,('clareienow', '', 'shieldshaag', '7', 'Jennifer', 'runolfsson', '7751 DejaPort Isidroville, TX 37444', 'tlittel@example.com', '5')
                    ,('colleen72', '9586253', 'flatley', '7', 'Korbin', 'crooks', '461 Zaria SqKrajcikville, AR 35038', 'htremblay@example.net', '8')
                    ,('colt93', '37743', 'langworth', '7', 'Jamar', 'schultzric', '19662 Mertz Courts AptSouth Raheem, NV 43244', 'gutkowski.edmond@example.net', '5')
                    ,('corssie', '91400731', 'eichmannblock', '7', 'Pat', 'hansen', '3564 Fadel CJovannymouth, FL 70581', 'david.herzog@example.net', '7')
                    ,('coytwrit', '87815785', 'hand', '1', 'Hyman', 'herman', '9352 Barrows Forge SuitClareshire, MD 15384', 'tboehm@example.org', '6')
                    ,('cronew', '283701', 'white', '2', 'Misael', 'gradyharbe', '60084 Leffler Road AptNorth Tyrashire, KY 87', 'nader.deshawn@example.com', '4')
                    ,('cruickshavi', '', 'borer', '2', 'Max', 'veumupton', '87852 Jacobson TurNorth Dionshire, GA 82959', 'rhea.schuster@example.org', '1')
                    ,('darian73', '1643596', 'glover', '7', 'Ardella', 'stiedemann', '0803 Maximillian Pine AptCroninmouth, NH 806', 'horacio37@example.net', '4')
                    ,('davonte38', '591', 'kling', '8', 'Colby', 'williamson', '999 LabadieEast Biankabury, WY 82903', 'elliot43@example.org', '8')
                    ,('dayne05', '', 'feeney', '9', 'Ayana', 'hegmannrei', '59696 Audreanne OveEast Ana, MS 31729-3228', 'amaya.hills@example.net', '5')
                    ,('desmond.towne', '', 'stoltenberg', '7', 'Mason', 'hoppe', '22445 Brionna Prairie SuitTreutelborough, MS', 'maryse69@example.com', '6')
                    ,('dina38', '805423396', 'considine', '8', 'Dennis', 'hahnbayer', '9553 Metz Lake Daltontown, ID 75679', 'deshawn99@example.org', '')
                    ,('douglas.betty', '6', 'hansen', '7', 'Bertrand', 'gerlachabb', '4839 Pfannerstill Trail SuitLaceyview, AZ 89', 'ljerde@example.com', '2')
                    ,('durgan.nils', '654991', 'hartmann', '2', 'Enos', 'kerlukesch', '38827 NienowLake Ashleeburgh, FL 64734-4447', 'heidenreich.queen@example.net', '8')
                    ,('durgan.tabitha', '82619', 'kirlin', '3', 'Henri', 'hilll', '2247 KuhicBrentberg, OR 22904', 'schuster.modesta@example.com', '2')
                    ,('dwehner', '39214', 'mitchellspencer', '1', 'Allene', 'hauck', '4591 McLaughlinGutmannland, KS 09103-4854', 'cpouros@example.com', '7')
                    ,('earnestintt', '64419126', 'rath', '7', 'Mark', 'hamillarms', '736 Rosella Estate AptLehnermouth, UT 98792', 'qbarton@example.com', '9')
                    ,('eichmananne', '49', 'pagac', '7', 'Julian', 'wilkinsons', '32756 MayaJeniferfort, IN 37285', 'monica71@example.net', '6')
                    ,('elena19', '6220850', 'mitchellhaley', '6', 'Heather', 'schmeler', '246 Earlene Station SuitLake Tessieside, CO ', 'godfrey40@example.com', '1')
                    ,('farreabell', '47021', 'zemlak', '9', 'Sydney', 'gerlach', '64048 AntonetteShanahanton, OH 02272', 'dmonahan@example.com', '8')
                    ,('fblock', '90074', 'satterfieldtromp', '7', 'Frank', 'dickinson', '353 Stracke Burg AptSouth Holden, ID 63629', 'pwisozk@example.org', '5')
                    ,('ffeil', '202165617', 'connelly', '6', 'Ruth', 'stromanhel', '908 Brycen Circle SuitSouth Tressaport, DE 9', 'vmueller@example.net', '7')
                    ,('fhermann', '3', 'rippin', '8', 'Yvette', 'kilback', '1570 Nolan Loop AptFritschland, IL 67153', 'kunze.tyrique@example.net', '2')
                    ,('frosenbaum', '70', 'dicki', '9', 'Jany', 'kohler', '79139 Aufderhar Heights AptBoyerport, LA 954', 'louisa.boyer@example.net', '3')
                    ,('gerdaeitenbe', '3', 'prosaccospinka', '3', 'Sunny', 'ferry', '8454 Greenholt TurNorth Kenton, CO 23430', 'shayne41@example.org', '6')
                    ,('gmann', '60794', 'huel', '1', 'Maybell', 'lockmanthi', '9253 Langosh Stream AptOlsonmouth, IA 93084-', 'anita.hand@example.net', '5')
                    ,('goldanger', '7010364', 'manndaugherty', '2', 'Krystina', 'yundt', '405 Murazik Harbors SuitEast Otiliamouth, TX', 'brandi64@example.net', '4')
                    ,('gootelyn', '', 'carrollsawayn', '5', 'Elyse', 'batz', '152 Fahey SKenyaberg, WI 55223-5766', 'feil.alayna@example.org', '')
                    ,('granvilmoen', '1896340', 'dare', '4', 'Maiya', 'schaefer', '161 Fritsch Plains AptJohnsfurt, VT 85531', 'nathan50@example.net', '6')
                    ,('greenholtrjun', '', 'prosaccokozey', '4', 'Evangeline', 'murazikqui', '2946 Manuela PrDickichester, MT 06459-2188', 'gdaniel@example.com', '6')
                    ,('gstehr', '616830540', 'waltergorczany', '7', 'America', 'jerde', '914 Gutmann TraffNew Antonestad, UT 46905', 'austen.bruen@example.org', '6')
                    ,('haaalia', '637', 'schiller', '5', 'Alyson', 'renner', '24543 Dooley ThrouBaumbachside, TN 21532', 'treva90@example.org', '')
                    ,('hagenesmille', '26', 'koelpinmcglynn', '7', 'Marc', 'gleichner', '06988 Hammes Manors SuitEast Pietrobury, MD ', 'augustus64@example.com', '8')
                    ,('heidiilll', '', 'blockschuster', '8', 'Marlee', 'bartellsch', '353 Johnston Rest SuitBrionnastad, AK 46245-', 'jaskolski.verlie@example.com', '6')
                    ,('hroberts', '9450212', 'becker', '7', 'Agustin', 'barton', '9531 Conn PEdgardotown, IN 35685-7015', 'adrienne21@example.org', '8')
                    ,('huelhul', '4', 'windler', '3', 'Olin', 'kesslerhea', '670 Abbott Cliff SuitBoscotown, HI 09556', 'merlin81@example.net', '9')
                    ,('icieoppe', '9244', 'koepp', '5', 'Lorine', 'mcdermottp', '198 Jermain Plains SuitFadelchester, UT 4824', 'ziemann.elody@example.org', '2')
                    ,('jackemke', '164', 'weimann', '5', 'Emmet', 'erdman', '331 Borer Squares SuitTyshawnhaven, AZ 43916', 'o\'conner.kevin@example.com', '3')
                    ,('janice81', '396247059', 'daugherty', '8', 'Eula', 'little', '475 Connelly Shoal SuitNorth Kelvinborough, ', 'mckenzie.bryce@example.net', '9')
                    ,('jasmin47', '6', 'purdy', '2', 'April', 'collins', '687 Mossie BPadbergfort, NY 59809', 'kailyn.metz@example.net', '7')
                    ,('jeraldilly', '586843086', 'feil', '2', 'Verner', 'walsh', '63774 Laurel Islands SuitWest Esteban, VA 06', 'casimer38@example.net', '5')
                    ,('jesse53', '4200', 'jacobson', '5', 'Hilton', 'kutch', '14967 Balistreri SNorth Fabiola, AZ 82492-65', 'howell.imelda@example.com', '')
                    ,('jessica90', '2111747', 'ankunding', '4', 'Justine', 'murazik', '51715 Altenwerth Crescent AptDerickfort, NY ', 'oleta81@example.org', '7')
                    ,('johann.ward', '581644222', 'konopelskiharvey', '4', 'Dock', 'heathcote', '90968 Daron North Jennifer, FL 39588-1384', 'ines.waelchi@example.org', '')
                    ,('jrunte', '9689514', 'breitenberg', '2', 'Icie', 'gorczanybl', '13666 Kolby Harbors SuitSouth Eric, TX 15335', 'tzulauf@example.net', '')
                    ,('juliearvin', '71147', 'hilll', '3', 'Dana', 'hicklemann', '5350 Aidan CiWest Laverneborough, KS 00091', 'kabbott@example.org', '9')
                    ,('katrinchuppe', '7', 'tromp', '3', 'Ronny', 'kerluke', '50937 Cassidy Walk AptWest Janick, SD 20075-', 'okuhic@example.com', '4')
                    ,('keanoppe', '12927', 'rathpacocha', '6', 'Miguel', 'quitzon', '4478 HermannVivienneborough, KY 05696', 'qleannon@example.com', '9')
                    ,('kelley2', '1', 'wehner', '5', 'Sandy', 'nikolaushe', '3996 Lorna Corner SuitLake Edgardo, VT 97128', 'reyes.vonrueden@example.net', '1')
                    ,('kendrick59', '', 'kuhic', '7', 'Woodrow', 'doyle', '372 Lelah Lake Norbertmouth, WV 15112-0577', 'o\'reilly.russell@example.net', '')
                    ,('kertzmanntho', '75073', 'mcdermottcummerata', '7', 'Elody', 'raynorharb', '0367 Robel Forest SuitRyleefort, IN 82089-22', 'ophelia.oberbrunner@example.co', '3')
                    ,('khaliueller', '692223', 'mclaughlin', '2', 'Camryn', 'schmitt', '875 Leffler Andersonchester, KY 99568', 'alanna.johns@example.com', '5')
                    ,('kkris', '', 'lebsack', '5', 'Elouise', 'zboncak', '4404 Bode MRoychester, MI 66492', 'kailey.ward@example.com', '7')
                    ,('koepparie', '8653938', 'feest', '4', 'Cassandra', 'torp', '98187 SanfordPort Cole, AL 27746-8014', 'dallin.nolan@example.net', '1')
                    ,('kswift', '31', 'osinski', '2', 'Zula', 'bartell', '34248 Jones Adaborough, PA 40299-2059', 'wolf.lilly@example.org', '')
                    ,('kuhlman.leonel', '614', 'schinner', '3', 'Billie', 'rohanchris', '1688 Newton South Kaitlyntown, KS 62366-7547', 'ruecker.vickie@example.org', '4')
                    ,('lacey43', '808', 'schinner', '4', 'Natalia', 'fritsch', '11271 Ransom North Brigitte, CO 63221', 'kbashirian@example.net', '4')
                    ,('langoshariell', '5073066', 'torp', '3', 'Marilou', 'huelschimm', '54199 GrahamJessycaport, CT 15830', 'gus96@example.org', '5')
                    ,('laura38', '5507', 'wolfcrooks', '7', 'Rowan', 'streich', '753 Clare Roads AptBryanamouth, MO 82841-226', 'eileen.breitenberg@example.com', '3')
                    ,('legros.antonett', '737459', 'gibsonkihn', '3', 'Catharine', 'gottlieb', '534 Marty Turnpike SuitSouth Aleen, WY 49996', 'nolan.trevion@example.org', '2')
                    ,('leuschke.wiley', '368002760', 'schowalter', '2', 'Melisa', 'larkin', '80882 McLaughlin Rosettatown, OR 25956-9239', 'jamey90@example.net', '5')
                    ,('lexus34', '9', 'maggio', '7', 'Alvena', 'champlin', '830 Langosh Road AptRunolfsdottirville, NE 8', 'annabell28@example.com', '6')
                    ,('liliane74', '348040', 'hilllkoepp', '3', 'Ciara', 'greenstark', '3338 Jacobson South Daveville, LA 63777-8738', 'thad96@example.org', '8')
                    ,('lilliana70', '329', 'hackettbarton', '1', 'Scottie', 'moen', '436 Kautzer LaNorth Hermannburgh, AL 49319', 'koelpin.ismael@example.org', '5')
                    ,('lilrami', '50789', 'cartwright', '7', 'Kasandra', 'daniel', '68171 Stanton Hills AptWest Ilene, MI 75125-', 'rippin.cortney@example.org', '4')
                    ,('lyncaren', '355788', 'mosciski', '6', 'Maye', 'caspermark', '2629 Adams Cove SuitRoycechester, VA 14982', 'miles.homenick@example.net', '3')
                    ,('lynchaunita', '723', 'koch', '1', 'Lenny', 'schowalter', '1513 Haley Mountains SuitAubreetown, LA 9730', 'avis.cummerata@example.com', '7')
                    ,('marcelluther', '7993', 'bartellkessler', '8', 'Haylie', 'trantow', '655 Cronin Green SuitAufderharborough, UT 13', 'vesta92@example.org', '7')
                    ,('marilie81', '502089017', 'barton', '9', 'Otto', 'mertzschow', '40432 Domenico Sauerview, ND 23055', 'rogahn.eusebio@example.net', '')
                    ,('martina55', '320', 'schumm', '5', 'Oma', 'windler', '749 Thiel Estates AptEast Jaquelinland, IA 2', 'psmith@example.org', '')
                    ,('marviessel', '', 'lang', '3', 'Tiana', 'carter', '13178 Santina MLake Juneborough, NM 06344', 'gunner.reilly@example.org', '9')
                    ,('mayestice', '2', 'littel', '9', 'Yessenia', 'monahankoz', '661 Okuneva Point SuitNorth Lilaburgh, AR 00', 'lang.callie@example.org', '2')
                    ,('minerva57', '321', 'stoltenberg', '7', 'Ansley', 'hermanjohn', '6368 Weissnat Path SuitRaymundoside, CA 1452', 'reyna40@example.net', '6')
                    ,('mohrncent', '5995', 'rippinweimann', '9', 'Mariane', 'herman', '60091 Rudolph Cliffs SuitWest Bessie, VT 912', 'imelda82@example.net', '3')
                    ,('monserrmcclu', '91792', 'damore', '2', 'Lina', 'lakin', '2200 AugustaLake Creola, UT 84177-0641', 'graham.alanis@example.com', '2')
                    ,('mrazena', '3760560', 'moorecruickshank', '8', 'Wilbert', 'bauchconsi', '83545 JanyRamonashire, AK 19478', 'sstracke@example.com', '5')
                    ,('nathaniermst', '913896252', 'witting', '6', 'Dorthy', 'spencer', '1458 Nigel Junctions AptAgneshaven, MS 42417', 'dylan.morissette@example.com', '')
                    ,('nayeli72', '25394193', 'gusikowski', '8', 'Rowan', 'kling', '327 Gusikowski Crossroad AptEttiefort, SC 77', 'roscoe.grant@example.com', '4')
                    ,('nbergstrom', '', 'purdy', '4', 'Stan', 'wilkinson', '943 Runte Leonfort, SC 95963', 'joesph.will@example.org', '8')
                    ,('nhauck', '200330', 'legros', '1', 'Nova', 'robertsgle', '4424 Fahey HNorth Lulu, VT 63673', 'wkshlerin@example.org', '8')
                    ,('nicolas57', '', 'stark', '5', 'Dayton', 'crona', '283 Wilderman Parks SuitWest Jaymemouth, DC ', 'marvin.ciara@example.org', '6')
                    ,('nova79', '1', 'quitzonsporer', '6', 'Lily', 'murphy', '02718 Green Lake Allyville, KS 41458-8655', 'bernier.shakira@example.org', '1')
                    ,('odickens', '1853345', 'purdymarks', '3', 'Eileen', 'grady', '885 Bernier Ways SuitEast Augustus, SD 23038', 'eliezer.strosin@example.net', '9')
                    ,('okutch', '9765324', 'mohr', '1', 'Holden', 'lindgrensc', '469 Stamm Fords AptSedrickhaven, IL 26282-81', 'dan41@example.org', '5')
                    ,('onaunte', '51547', 'ernser', '5', 'Tod', 'blick', '58049 Abbott ViGleichnertown, FL 03172', 'olegros@example.org', '8')
                    ,('pacocharieda', '82', 'kuphal', '4', 'Elsa', 'predovic', '326 Heaney TNorth Emelie, ND 57952', 'dkuhlman@example.org', '8')
                    ,('palma09', '905265', 'stammzboncak', '6', 'Abdullah', 'johnstonje', '1912 Jacobson East Alyce, DE 27644-0790', 'hayden03@example.org', '7')
                    ,('patiencezog', '5400262', 'swift', '6', 'Lucius', 'watsica', '6300 Candice Port Mayfurt, AK 66906', 'vivian23@example.net', '')
                    ,('pdoyle', '', 'huel', '3', 'Anastacio', 'kessler', '895 Adriana Mission AptPollichborough, NY 07', 'dexter13@example.net', '7')
                    ,('pink80', '2622159', 'douglas', '2', 'Thad', 'hicklemert', '9091 Frami FNasirbury, TN 73756', 'wendell70@example.com', '')
                    ,('qcormier', '71', 'west', '3', 'Angelo', 'hermanskil', '1424 Lueilwitz Village AptPort Raphaelmouth,', 'gustave.ziemann@example.com', '9')
                    ,('qhilll', '3784', 'mclaughlin', '3', 'Ola', 'bernhardcr', '70806 Spencer Plains AptEast Wilmaborough, R', 'lroberts@example.com', '5')
                    ,('rahul.zulauf', '3273', 'stamm', '1', 'Gust', 'satterfiel', '9919 Melba East Vaughn, SC 61456-8721', 'vonrueden.bobby@example.org', '4')
                    ,('ramon38', '9473', 'abshire', '5', 'Deonte', 'nitzschebo', '8024 Kuvalis Stream AptPort Bernadine, AZ 21', 'missouri22@example.org', '5')
                    ,('rhett85', '', 'kulas', '3', 'Darion', 'cormierrun', '4188 Kris Valleys AptFrancomouth, NC 69788-0', 'beryl.russel@example.com', '2')
                    ,('rockyode', '559419', 'beersporer', '2', 'Matteo', 'torphygree', '160 Harvey Route SuitPort Enrico, ND 47130', 'cleora93@example.net', '5')
                    ,('roeoen', '374', 'wolf', '5', 'Reginald', 'schulist', '339 Olaf Route SuitWest Gayleville, HI 68896', 'kautzer.ila@example.net', '7')
                    ,('roel71', '9540428', 'markshaley', '8', 'Mckenzie', 'bruendecko', '3443 Abby Place AptStefanport, CA 99308-5330', 'rosa59@example.org', '')
                    ,('rthompson', '30998', 'bode', '9', 'Mario', 'halvorsonl', '6532 Ryley Keys AptLake Judyville, MT 78495', 'jennings.bechtelar@example.net', '3')
                    ,('rupertergstro', '77656674', 'kuhic', '5', 'Verner', 'cormier', '05221 Hirthe Jamalberg, IA 63267-3241', 'lyric15@example.org', '4')
                    ,('samantha27', '89', 'cruickshankfranecki', '8', 'Stewart', 'greenchamp', '98905 Demarco Shoals AptLabadieburgh, MS 140', 'lera90@example.org', '9')
                    ,('samsonurray', '92227', 'rueckerdavis', '6', 'Damon', 'toy', '0952 Hegmann Sipesside, MI 27566', 'lschuppe@example.org', '7')
                    ,('sedrick13', '10', 'runolfssonmarquardt', '7', 'Queenie', 'douglas', '901 Hudson PrWest Theresiastad, FL 07463', 'boris11@example.net', '9')
                    ,('shudson', '85', 'blandakozey', '5', 'Thea', 'satterfiel', '91783 RodriguezWest Christophe, DC 31213', 'rowan34@example.com', '5')
                    ,('sohara', '96946', 'crona', '9', 'Josie', 'mraz', '771 Windler Forest SuitBeiertown, ID 12312-6', 'whartmann@example.com', '4')
                    ,('sporerannon', '63', 'bartellshanahan', '9', 'Ashleigh', 'hesselschm', '947 Tracey Katrinaberg, SC 43704-9040', 'schulist.jared@example.net', '2')
                    ,('strosiertha', '5227', 'lang', '5', 'Eva', 'bahringer', '35370 Hermiston Brooks AptNorth Melvinhaven,', 'qhackett@example.org', '9')
                    ,('tbode', '', 'schmidtkemmer', '9', 'Rhiannon', 'bergstroms', '7287 QuigleWest Adriennemouth, NM 67000', 'tyrique97@example.net', '5')
                    ,('thompsonisto', '1113887', 'balistreri', '4', 'Alfreda', 'emmerichle', '30976 Dora Trail AptAnkundinghaven, CT 50550', 'arussel@example.com', '2')
                    ,('tremblayreema', '176649', 'mcclure', '3', 'Mohammad', 'howe', '0953 Rau Ways AptNew Jorditon, IN 79149-2414', 'alanis.terry@example.com', '3')
                    ,('tryan', '242195206', 'towne', '2', 'Laura', 'ortiz', '817 Robel TurRatkeburgh, MT 76041-5441', 'albertha.larkin@example.org', '2')
                    ,('twhite', '817', 'mante', '8', 'Adonis', 'monahan', '325 Unique Mountain AptIanland, HI 28722-124', 'breanna.daniel@example.com', '8')
                    ,('tyree60', '5181', 'fisherwest', '5', 'Electa', 'reilly', '636 Heathcote Lake Deonte, MD 53854-9842', 'schmidt.devante@example.net', '3')
                    ,('usipes', '95233470', 'wisozk', '7', 'Elfrieda', 'walshhowel', '465 Fabian Forks SuitWest Berneiceville, KS ', 'kevon13@example.com', '5')
                    ,('verla50', '208414765', 'cruickshank', '5', 'Sarai', 'kilback', '1328 Prosacco Shannafort, HI 97547', 'gzieme@example.com', '')
                    ,('virginhalvor', '7211172', 'uptonbecker', '7', 'Morris', 'zboncak', '2667 Stracke Via AptSmithammouth, AK 92907', 'bianka.wunsch@example.org', '7')
                    ,('vitonnelly', '4924963', 'haleyglover', '1', 'Karelle', 'mosciski', '37911 Renner AArchibaldshire, DC 12433-6505', 'emie.padberg@example.net', '4')
                    ,('walteabdul', '84', 'conroy', '4', 'Luisa', 'shanahan', '92227 Thelma Prairie AptSouth Trishashire, N', 'kaya02@example.net', '7')
                    ,('wbahringer', '1640605', 'schowalter', '8', 'Kallie', 'hickle', '311 KubNew Noe, WA 49614', 'kasey35@example.com', '6')
                    ,('winfield19', '61120', 'runolfsson', '4', 'Johan', 'grimes', '7126 Eileen Course AptSouth Macie, PA 83154-', 'silas.heller@example.org', '7')
                    ,('wisoklises', '6689', 'donnelly', '5', 'Agustina', 'sawayn', '43032 AriannaElishachester, NJ 44496-4633', 'leuschke.lorenzo@example.org', '1')
                    ,('wsmith', '75', 'daviswiegand', '5', 'Bernie', 'wisoky', '717 Michel Coves SuitNorth Ethelyn, IA 75184', 'ardella.mosciski@example.net', '7')
                    ,('wunscconner', '6297681', 'walkeroconner', '5', 'Arielle', 'bode', '83039 Selina New Margemouth, DE 54340-9076', 'conn.gavin@example.net', '5')
                    ,('xcarroll', '759223958', 'koss', '8', 'Yasmine', 'tremblay', '75626 Sofia Pine AptWest Beulahbury, NM 9703', 'qlangosh@example.net', '9')
                    ,('xmertz', '8', 'mckenzie', '3', 'Asa', 'mcglynnwes', '152 Kuhn TurPort Sabryna, MD 73606-7606', 'brody44@example.org', '8')
                    ,('yhalvorson', '85', 'aufderhar', '9', 'Tyrese', 'hermann', '32132 Yadira Falls SuitSchoenport, PA 06317', 'rippin.arnoldo@example.com', '4')
                    ,('zfisher', '708009', 'ebert', '8', 'Elmo', 'oconnellba', '206 Lacey LaBrainbury, VA 36333-5891', 'jacobson.edgardo@example.com', '4')
                    ,('zgutmann', '10', 'parisianhermiston', '7', 'Electa', 'rowe', '856 Jennyfer Prairie SuitLudwigbury, MS 4524', 'blegros@example.net', '2')
                    ,('zkshlerin', '592', 'dickinsonherzog', '4', 'Demond', 'ohara', '5546 Lavonne Port AptEast Keara, PA 59806-60', 'ben81@example.com', '8');";
                break;

            case 'recruitment' :
                $sql = "insert into `recruitment` values (null, 'ilhase', '포크 생산라인 근무자', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22','경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '참치 생산라인 근무자', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '경로식당 식자재 생산', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '월급 330000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '실버카페 물류사업단', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '커피 원두 생산', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '월급 400000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '누룽지 제조', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '포크 생산라인 근무자', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '참치 생산라인 근무자', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '경로식당 식자재 생산', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '월급 330000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '실버카페 물류사업단', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '커피 원두 생산', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '월급 400000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '누룽지 제조', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '포크 생산라인 근무자', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '참치 생산라인 근무자', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '경로식당 식자재 생산', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '월급 330000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '실버카페 물류사업단', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '커피 원두 생산', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '월급 400000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '누룽지 제조', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),

                    (null, 'starbucks', '포크 포장', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 조립/포장', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'starbucks', '참치 포장', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 조립/포장', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'starbucks', '식자재 포장', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 조립/포장', '3', '무관', '무관', '월급 330000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'starbucks', '간단한 박스 포장 업무', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 조립/포장', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'starbucks', '커피 원두 포장', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 조립/포장', '3', '무관', '무관', '월급 400000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'starbucks', '누룽지 포장', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 조립/포장', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'starbucks', '식자재 포장', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 조립/포장', '3', '무관', '무관', '월급 330000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'starbucks', '간단한 박스 포장 업무', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 조립/포장', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'starbucks', '커피 원두 포장', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 조립/포장', '3', '무관', '무관', '월급 400000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'starbucks', '누룽지 포장', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 조립/포장', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),

                    (null, 'chamchi', '건물 경비원 구인', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '경비/시설관리 경비원', '3', '무관', '무관', '시급 9000원', '시간제', '2020-01-22', '2020-02-22', '서울 성동구 도선동 39-1', null, null, now()),
                    (null, 'chamchi', '아파트 경비원 구인', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '경비/시설관리 경비원', '3', '무관', '무관', '시급 8900원', '시간제', '2020-01-22', '2020-02-22', '서울 성동구 도선동 39-1', null, null, now()),
                    (null, 'chamchi', '경비 인력 모집', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '경비/시설관리 경비원', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '서울 성동구 도선동 39-1', null, null, now()),
                    (null, 'chamchi', '공원 미화원', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '청소/미화 청소원', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '서울 성동구 도선동 39-1', null, null, now()),
                    (null, 'chamchi', '여행자거리 미화원', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '청소/미화 청소원', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '서울 성동구 도선동 39-1', null, null, now()),
                    (null, 'chamchi', '건물 경비원 구인', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '경비/시설관리 경비원', '3', '무관', '무관', '시급 9000원', '시간제', '2020-01-22', '2020-02-22', '서울 성동구 도선동 39-1', null, null, now()),
                    (null, 'chamchi', '아파트 경비원 구인', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '경비/시설관리 경비원', '3', '무관', '무관', '시급 8900원', '시간제', '2020-01-22', '2020-02-22', '서울 성동구 도선동 39-1', null, null, now()),
                    (null, 'chamchi', '경비 인력 모집', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '경비/시설관리 경비원', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '서울 성동구 도선동 39-1', null, null, now()),
                    (null, 'chamchi', '공원 미화원', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '청소/미화 청소원', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '서울 성동구 도선동 39-1', null, null, now()),
                    
                    (null, 'ilhase', '참치 생산라인 근무자', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '경로식당 식자재 생산', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '월급 330000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '실버카페 물류사업단', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '커피 원두 생산', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '월급 400000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '누룽지 제조', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '포크 생산라인 근무자', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '참치 생산라인 근무자', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '경로식당 식자재 생산', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '월급 330000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '실버카페 물류사업단', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '커피 원두 생산', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '월급 400000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '누룽지 제조', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '포크 생산라인 근무자', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '참치 생산라인 근무자', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '경로식당 식자재 생산', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '월급 330000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '실버카페 물류사업단', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '커피 원두 생산', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '월급 400000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'ilhase', '누룽지 제조', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 생산/제조', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),

                    (null, 'mac123', '포크 포장', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 조립/포장', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'mac123', '참치 포장', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 조립/포장', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'mac123', '식자재 포장', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 조립/포장', '3', '무관', '무관', '월급 330000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'mac123', '간단한 박스 포장 업무', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 조립/포장', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'mac123', '커피 원두 포장', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 조립/포장', '3', '무관', '무관', '월급 400000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'mac123', '누룽지 포장', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 조립/포장', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'mac123', '식자재 포장', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 조립/포장', '3', '무관', '무관', '월급 330000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'mac123', '간단한 박스 포장 업무', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 조립/포장', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'mac123', '커피 원두 포장', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 조립/포장', '3', '무관', '무관', '월급 400000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),
                    (null, 'mac123', '누룽지 포장', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '생산/제조/단순노무 조립/포장', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '경기 성남시 분당구 백현동 19-2', null, null, now()),

                    (null, 'chocolate1', '건물 경비원 구인', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '경비/시설관리 경비원', '3', '무관', '무관', '시급 9000원', '시간제', '2020-01-22', '2020-02-22', '서울 성동구 도선동 39-1', null, null, now()),
                    (null, 'chocolate1', '아파트 경비원 구인', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '경비/시설관리 경비원', '3', '무관', '무관', '시급 8900원', '시간제', '2020-01-22', '2020-02-22', '서울 성동구 도선동 39-1', null, null, now()),
                    (null, 'chocolate1', '경비 인력 모집', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '경비/시설관리 경비원', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '서울 성동구 도선동 39-1', null, null, now()),
                    (null, 'chocolate1', '공원 미화원', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '청소/미화 청소원', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '서울 성동구 도선동 39-1', null, null, now()),
                    (null, 'chocolate1', '여행자거리 미화원', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '청소/미화 청소원', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '서울 성동구 도선동 39-1', null, null, now()),
                    (null, 'chocolate1', '건물 경비원 구인', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '경비/시설관리 경비원', '3', '무관', '무관', '시급 9000원', '시간제', '2020-01-22', '2020-02-22', '서울 성동구 도선동 39-1', null, null, now()),
                    (null, 'chocolate1', '아파트 경비원 구인', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '경비/시설관리 경비원', '3', '무관', '무관', '시급 8900원', '시간제', '2020-01-22', '2020-02-22', '서울 성동구 도선동 39-1', null, null, now()),
                    (null, 'chocolate1', '경비 인력 모집', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '경비/시설관리 경비원', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '서울 성동구 도선동 39-1', null, null, now()),
                    (null, 'chocolate1', '공원 미화원', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '청소/미화 청소원', '3', '무관', '무관', '시급 12000원', '시간제', '2020-01-22', '2020-02-22', '서울 성동구 도선동 39-1', null, null, now()),
                    (null, 'chocolate1', '건물 경비원 구인', '테스트 공고입니다. 성실한 분들 찾아요', '김채용', '010-9999-8888', 'kim@chae.com', 'www.4jo.com', '경비/시설관리 경비원', '3', '무관', '무관', '연봉 2500만원', '시간제', '2020-01-22', '2020-02-22', '서울 성동구 도선동 39-1', null, null, now()),
                    



                    (null,'chocolate1','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3749','recruit@ilhase.co ','www.ilhase.com','생산/제조/단순노무 제품 검사',3,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 859',null, null, now())
                    ,(null,'chamchi','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3748','recruit@ilhase.co ','www.ilhase.com','생산/제조/단순노무 제품 검사',2,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 858',null,null,now())
                    ,(null,'celestial','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3750','recruit@ilhase.co ','www.ilhase.com','생산/제조/단순노무 제품 검사',4,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 860',null,null,now())
                    ,(null,'starbucks','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3751','recruit@ilhase.co ','www.ilhase.com','생산/제조/단순노무 제품 검사',5,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 861',null,null,now())
                    ,(null,'mac123','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3752','recruit@ilhase.co ','www.ilhase.com','생산/제조/단순노무 제품 검사',6,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 862',null,null,now())
                    ,(null,'chamchi','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3753','recruit@ilhase.co ','www.ilhase.com','생산/제조/단순노무 제품 검사',7,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 863',null,null,now())
                    ,(null,'ilhase','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3754','recruit@ilhase.co ','www.ilhase.com','생산/제조/단순노무 제품 검사',8,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 864',null,null,now())
                    ,(null,'chamchi','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3755','recruit@ilhase.co ','www.ilhase.com','생산/제조/단순노무 제품 검사',9,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 865',null,null,now())
                    ,(null,'chamchi','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3756','recruit@ilhase.co ','www.ilhase.com','생산/제조/단순노무 제품 검사',10,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 866',null,null,now())
                    ,(null,'chocolate1','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3757','recruit@ilhase.co ','www.ilhase.com','생산/제조/단순노무 제품 검사',11,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 867',null,null,now())
                    ,(null,'celestial','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3758','recruit@ilhase.co ','www.ilhase.com','생산/제조/단순노무 제품 검사',12,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 868',null,null,now())
                    ,(null,'starbucks','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3759','recruit@ilhase.co ','www.ilhase.com','생산/제조/단순노무 제품 검사',13,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 869',null,null,now())
                    ,(null,'mac123','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3760','recruit@ilhase.co ','www.ilhase.com','생산/제조/단순노무 제품 검사',14,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 870',null,null,now())
                    ,(null,'chamchi','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3761','recruit@ilhase.co ','www.ilhase.com','생산/제조/단순노무 제품 검사',15,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 871',null,null,now())
                    ,(null,'ilhase','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3762','recruit@ilhase.co ','www.ilhase.com','생산/제조/단순노무 제품 검사',16,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 872',null,null,now())
                    ,(null,'chamchi','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3763','recruit@ilhase.co ','www.ilhase.com','생산/제조/단순노무 제품 검사',17,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 873',null,null,now())
                    ,(null,'chamchi','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3764','recruit@ilhase.co ','www.ilhase.com','생산/제조/단순노무 제품 검사',18,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 874',null,null,now())
                    ,(null,'chocolate1','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3765','recruit@ilhase.co ','www.ilhase.com','생산/제조/단순노무 제품 검사',19,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 875',null,null,now())
                    ,(null,'celestial','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3766','recruit@ilhase.co ','www.ilhase.com','생산/제조/단순노무 제품 검사',20,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 876',null,null,now())
                    ,(null,'starbucks','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3767','recruit@ilhase.co ','www.ilhase.com','생산/제조/단순노무 제품 검사',21,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 877',null,null,now())
                    ,(null,'mac123','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3768','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',22,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 878',null,null,now())
                    ,(null,'chamchi','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3769','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',23,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 879',null,null,now())
                    ,(null,'ilhase','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3770','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',24,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 880',null,null,now())
                    ,(null,'chamchi','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3771','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',25,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 881',null,null,now())
                    ,(null,'chamchi','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3772','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',26,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 882',null,null,now())
                    ,(null,'chamchi','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3773','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',27,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 883',null,null,now())
                    ,(null,'chocolate1','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3774','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',28,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 884',null,null,now())
                    ,(null,'celestial','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3775','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',29,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 885',null,null,now())
                    ,(null,'starbucks','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3776','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',30,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 886',null,null,now())
                    ,(null,'mac123','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3777','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',31,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 887',null,null,now())
                    ,(null,'chamchi','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3778','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',32,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 888',null,null,now())
                    ,(null,'ilhase','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3779','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',33,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 889',null,null,now())
                    ,(null,'chamchi','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3780','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',34,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 890',null,null,now())
                    ,(null,'chocolate1','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3781','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',35,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 891',null,null,now())
                    ,(null,'celestial','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3782','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',36,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 892',null,null,now())
                    ,(null,'starbucks','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3783','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',37,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 893',null,null,now())
                    ,(null,'mac123','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3784','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',38,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1420',null,null,now())
                    ,(null,'chamchi','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3785','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',39,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1421',null,null,now())
                    ,(null,'ilhase','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3786','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',40,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1422',null,null,now())
                    ,(null,'chamchi','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3787','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',41,'경력','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1423',null,null,now())
                    ,(null,'chamchi','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3788','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',42,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1424',null,null,now())
                    ,(null,'chocolate1','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3789','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',43,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1425',null,null,now())
                    ,(null,'celestial','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3790','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',44,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1426',null,null,now())
                    ,(null,'starbucks','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3791','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',45,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1427',null,null,now())
                    ,(null,'mac123','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3792','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',46,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1428',null,null,now())
                    ,(null,'chamchi','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3793','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',47,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1429',null,null,now())
                    ,(null,'ilhase','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3794','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',48,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1430',null,null,now())
                    ,(null,'chamchi','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3795','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',49,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1431',null,null,now())
                    ,(null,'chamchi','제품관리자 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3796','recruit@ilhase.co ','www.ilhase.com','경비/시설관리 주차 관리',50,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1432',null,null,now())
                    ,(null,'chocolate1','건물 미화원 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3797','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',51,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1433',null,null,now())
                    ,(null,'celestial','건물 미화원 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3798','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',52,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1434',null,null,now())
                    ,(null,'starbucks','건물 미화원 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3799','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',53,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1435',null,null,now())
                    ,(null,'mac123','건물 미화원 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3800','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',54,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1436',null,null,now())
                    ,(null,'chamchi','건물 미화원 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3801','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',55,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1437',null,null,now())
                    ,(null,'ilhase','건물 미화원 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3802','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',56,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1438',null,null,now())
                    ,(null,'chamchi','건물 미화원 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3803','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',57,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1439',null,null,now())
                    ,(null,'ilhase','건물 미화원 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3804','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',58,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1440',null,null,now())
                    ,(null,'ilhase','건물 미화원 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3805','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',59,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대전 서구 둔산1동 1441',null,null,now())
                    ,(null,'chamchi','건물 미화원 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3806','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',60,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 916',null,null,now())
                    ,(null,'chamchi','건물 미화원 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3807','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',61,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 917',null,null,now())
                    ,(null,'chocolate1','건물 미화원 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3808','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',62,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 918',null,null,now())
                    ,(null,'celestial','건물 미화원 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3809','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 919',null,null,now())
                    ,(null,'starbucks','건물 미화원 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3810','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 920',null,null,now())
                    ,(null,'mac123','건물 미화원 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3811','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 921',null,null,now())
                    ,(null,'chamchi','건물 미화원 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3812','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 922',null,null,now())
                    ,(null,'ilhase','건물 미화원 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3813','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','서울 강남구 역삼동 923',null,null,now())
                    ,(null,'chamchi','청소 해주실 분','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3814','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대구 중구 동인동1가 2-1',null,null,now())
                    ,(null,'ilhase','청소 해주실 분','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3815','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대구 중구 동인동1가 2-2',null,null,now())
                    ,(null,'ilhase','청소 해주실 분','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3816','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대구 중구 동인동1가 2-3',null,null,now())
                    ,(null,'chamchi','청소 해주실 분','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3817','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대구 중구 동인동1가 2-4',null,null,now())
                    ,(null,'chamchi','청소 해주실 분','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3818','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대구 중구 동인동1가 2-5',null,null,now())
                    ,(null,'chocolate1','청소 해주실 분','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3819','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대구 중구 동인동1가 2-6',null,null,now())
                    ,(null,'celestial','청소 해주실 분','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3820','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대구 중구 동인동1가 2-7',null,null,now())
                    ,(null,'starbucks','청소 해주실 분','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3821','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대구 중구 동인동1가 2-8',null,null,now())
                    ,(null,'mac123','청소 해주실 분','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3822','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대구 중구 동인동1가 2-9',null,null,now())
                    ,(null,'chamchi','청소 해주실 분','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3823','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대구 중구 동인동1가 2-10',null,null,now())
                    ,(null,'ilhase','청소 해주실 분','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3824','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대구 중구 동인동1가 2-11',null,null,now())
                    ,(null,'chamchi','청소 해주실 분','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3825','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대구 중구 동인동1가 2-12',null,null,now())
                    ,(null,'ilhase','청소 해주실 분','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3826','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대구 중구 동인동1가 2-13',null,null,now())
                    ,(null,'ilhase','청소 해주실 분','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3827','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대구 중구 동인동1가 2-14',null,null,now())
                    ,(null,'chamchi','청소 해주실 분','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3828','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대구 중구 동인동1가 2-15',null,null,now())
                    ,(null,'chamchi','청소 해주실 분','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3829','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대구 중구 동인동1가 2-16',null,null,now())
                    ,(null,'chocolate1','청소 해주실 분','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3830','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대구 중구 동인동1가 2-17',null,null,now())
                    ,(null,'celestial','청소 해주실 분','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3831','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-01-30','2020-03-02','대구 중구 동인동1가 2-18',null,null,now())
                    ,(null,'starbucks','청소 해주실 분','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3832','recruit@ilhase.co ','www.ilhase.com','청소/미화 청소원',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','대구 중구 동인동1가 2-19',null,null,now())
                    ,(null,'mac123','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3833','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','대구 중구 동인동1가 2-20',null,null,now())
                    ,(null,'chamchi','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3834','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','대구 중구 동인동1가 2-21',null,null,now())
                    ,(null,'ilhase','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3835','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','대구 중구 동인동1가 2-22',null,null,now())
                    ,(null,'chamchi','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3836','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','대구 중구 동인동1가 2-23',null,null,now())
                    ,(null,'chamchi','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3837','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','대구 중구 동인동1가 2-24',null,null,now())
                    ,(null,'chocolate1','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3838','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','대구 중구 동인동1가 2-25',null,null,now())
                    ,(null,'celestial','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3839','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','대구 중구 동인동1가 2-26',null,null,now())
                    ,(null,'starbucks','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3840','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','대구 중구 동인동1가 2-27',null,null,now())
                    ,(null,'mac123','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3841','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1000',null,null,now())
                    ,(null,'chamchi','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3842','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1001',null,null,now())
                    ,(null,'ilhase','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3843','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1002',null,null,now())
                    ,(null,'chamchi','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3844','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1003',null,null,now())
                    ,(null,'ilhase','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3845','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1004',null,null,now())
                    ,(null,'ilhase','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3846','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1005',null,null,now())
                    ,(null,'chamchi','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3847','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1006',null,null,now())
                    ,(null,'chamchi','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3848','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1007',null,null,now())
                    ,(null,'chocolate1','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3849','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1008',null,null,now())
                    ,(null,'celestial','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3850','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1009',null,null,now())
                    ,(null,'starbucks','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3851','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1010',null,null,now())
                    ,(null,'mac123','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3852','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1011',null,null,now())
                    ,(null,'chamchi','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3853','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1012',null,null,now())
                    ,(null,'ilhase','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3854','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1013',null,null,now())
                    ,(null,'chamchi','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3855','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1014',null,null,now())
                    ,(null,'ilhase','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3856','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1015',null,null,now())
                    ,(null,'ilhase','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3857','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1016',null,null,now())
                    ,(null,'ilhase','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3858','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1017',null,null,now())
                    ,(null,'ilhase','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3859','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1018',null,null,now())
                    ,(null,'ilhase','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3860','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1019',null,null,now())
                    ,(null,'chamchi','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3861','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1020',null,null,now())
                    ,(null,'chamchi','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3862','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1021',null,null,now())
                    ,(null,'chocolate1','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3863','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1022',null,null,now())
                    ,(null,'celestial','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3864','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1023',null,null,now())
                    ,(null,'starbucks','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3865','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1024',null,null,now())
                    ,(null,'mac123','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3866','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1025',null,null,now())
                    ,(null,'chamchi','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3867','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1026',null,null,now())
                    ,(null,'ilhase','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3868','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1027',null,null,now())
                    ,(null,'chamchi','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3869','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1028',null,null,now())
                    ,(null,'ilhase','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3870','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1029',null,null,now())
                    ,(null,'chamchi','베이비 시터 구함','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3871','recruit@ilhase.co ','www.ilhase.com','도우미 가사도우미',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1030',null,null,now())
                    ,(null,'chocolate1','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3872','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1031',null,null,now())
                    ,(null,'celestial','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3873','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1032',null,null,now())
                    ,(null,'starbucks','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3874','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1033',null,null,now())
                    ,(null,'mac123','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3875','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1034',null,null,now())
                    ,(null,'chamchi','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3876','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1035',null,null,now())
                    ,(null,'ilhase','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3877','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1036',null,null,now())
                    ,(null,'chamchi','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3878','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1037',null,null,now())
                    ,(null,'ilhase','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3879','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1038',null,null,now())
                    ,(null,'chamchi','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3880','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1039',null,null,now())
                    ,(null,'chocolate1','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3881','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1040',null,null,now())
                    ,(null,'celestial','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3882','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1041',null,null,now())
                    ,(null,'starbucks','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3883','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1042',null,null,now())
                    ,(null,'mac123','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3884','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',4,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1043',null,null,now())
                    ,(null,'chamchi','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3885','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',5,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1044',null,null,now())
                    ,(null,'ilhase','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3886','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',6,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1045',null,null,now())
                    ,(null,'chamchi','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3887','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',7,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1046',null,null,now())
                    ,(null,'ilhase','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3888','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',8,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1047',null,null,now())
                    ,(null,'chamchi','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3889','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',9,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1048',null,null,now())
                    ,(null,'chocolate1','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3890','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',10,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1049',null,null,now())
                    ,(null,'celestial','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3891','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',11,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1050',null,null,now())
                    ,(null,'starbucks','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3892','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',1,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1051',null,null,now())
                    ,(null,'mac123','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3893','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',1,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1052',null,null,now())
                    ,(null,'chamchi','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3894','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',1,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','부산 연제구 연산동 1053',null,null,now())
                    ,(null,'ilhase','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3895','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',1,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 1',null,null,now())
                    ,(null,'chamchi','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3896','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',1,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 2',null,null,now())
                    ,(null,'ilhase','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3897','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',1,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 3',null,null,now())
                    ,(null,'chamchi','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3898','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',1,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 4',null,null,now())
                    ,(null,'chocolate1','주방장 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3899','recruit@ilhase.co ','www.ilhase.com','음식점/마트/주유 서빙',1,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 5',null,null,now())
                    ,(null,'celestial','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3900','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 6',null,null,now())
                    ,(null,'starbucks','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3901','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 7',null,null,now())
                    ,(null,'mac123','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3902','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',4,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 8',null,null,now())
                    ,(null,'chamchi','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3903','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',5,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 9',null,null,now())
                    ,(null,'ilhase','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3904','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',6,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 10',null,null,now())
                    ,(null,'chamchi','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3905','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',7,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 11',null,null,now())
                    ,(null,'ilhase','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3906','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',8,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 12',null,null,now())
                    ,(null,'chamchi','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3907','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',9,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 13',null,null,now())
                    ,(null,'chocolate1','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3908','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',10,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 14',null,null,now())
                    ,(null,'celestial','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3909','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 15',null,null,now())
                    ,(null,'starbucks','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3910','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 16',null,null,now())
                    ,(null,'mac123','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3911','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 17',null,null,now())
                    ,(null,'chamchi','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3912','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 18',null,null,now())
                    ,(null,'ilhase','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3913','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 19',null,null,now())
                    ,(null,'chamchi','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3914','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 20',null,null,now())
                    ,(null,'ilhase','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3915','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 21',null,null,now())
                    ,(null,'chamchi','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3916','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',4,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 22',null,null,now())
                    ,(null,'chocolate1','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3917','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',5,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 23',null,null,now())
                    ,(null,'celestial','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3918','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',6,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 24',null,null,now())
                    ,(null,'starbucks','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3919','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',7,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 25',null,null,now())
                    ,(null,'mac123','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3920','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',8,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 26',null,null,now())
                    ,(null,'chamchi','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3921','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',9,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 27',null,null,now())
                    ,(null,'ilhase','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3922','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',10,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 28',null,null,now())
                    ,(null,'chamchi','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3923','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',11,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 29',null,null,now())
                    ,(null,'ilhase','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3924','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',12,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 30',null,null,now())
                    ,(null,'chamchi','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3925','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',13,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 31',null,null,now())
                    ,(null,'chocolate1','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3926','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',14,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 32',null,null,now())
                    ,(null,'celestial','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3927','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',15,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 33',null,null,now())
                    ,(null,'starbucks','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3928','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',16,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 34',null,null,now())
                    ,(null,'mac123','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3929','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',17,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 35',null,null,now())
                    ,(null,'chamchi','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3930','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',18,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 36',null,null,now())
                    ,(null,'ilhase','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3931','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 37',null,null,now())
                    ,(null,'chamchi','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3932','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 38',null,null,now())
                    ,(null,'ilhase','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3933','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 39',null,null,now())
                    ,(null,'chamchi','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3934','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 40',null,null,now())
                    ,(null,'chocolate1','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3935','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 41',null,null,now())
                    ,(null,'celestial','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3936','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 42',null,null,now())
                    ,(null,'starbucks','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3937','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 43',null,null,now())
                    ,(null,'mac123','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3938','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 44',null,null,now())
                    ,(null,'chamchi','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3939','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 45',null,null,now())
                    ,(null,'ilhase','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3940','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',3,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 46',null,null,now())
                    ,(null,'chamchi','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3941','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',29,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 47',null,null,now())
                    ,(null,'ilhase','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3942','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',30,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 48',null,null,now())
                    ,(null,'chamchi','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3943','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',31,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 49',null,null,now())
                    ,(null,'chocolate1','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3944','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 배달',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경남 창원시 의창구 용호동 50',null,null,now())
                    ,(null,'celestial','역사 해설 전문가 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3945','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1000',null,null,now())
                    ,(null,'starbucks','역사 해설 전문가 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3946','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1001',null,null,now())
                    ,(null,'mac123','역사 해설 전문가 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3947','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1002',null,null,now())
                    ,(null,'chamchi','역사 해설 전문가 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3948','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1003',null,null,now())
                    ,(null,'ilhase','역사 해설 전문가 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3949','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1004',null,null,now())
                    ,(null,'chamchi','역사 해설 전문가 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3950','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1005',null,null,now())
                    ,(null,'ilhase','역사 해설 전문가 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3951','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1006',null,null,now())
                    ,(null,'chamchi','역사 해설 전문가 구인','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3952','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1007',null,null,now())
                    ,(null,'chocolate1','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3953','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1008',null,null,now())
                    ,(null,'celestial','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3954','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1009',null,null,now())
                    ,(null,'starbucks','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3955','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','세종특별자치시 전동면 송성리 9',null,null,now())
                    ,(null,'mac123','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3956','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경북 경주시 산내면 내칠리 715',null,null,now())
                    ,(null,'chamchi','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3957','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','서울 성동구 도선동 39-1',null,null,now())
                    ,(null,'ilhase','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3958','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경기 성남시 분당구 백현동 19-2',null,null,now())
                    ,(null,'chamchi','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3959','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전북 전주시 완산구 서노송동 568-1',null,null,now())
                    ,(null,'ilhase','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3960','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','강원 춘천시 명동길 2',null,null,now())
                    ,(null,'chamchi','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3961','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충북 제천시 청풍면 물태리 98-2',null,null,now())
                    ,(null,'chocolate1','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3962','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충남 보령시 신흑동 2267-3',null,null,now())
                    ,(null,'celestial','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3963','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1018',null,null,now())
                    ,(null,'starbucks','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3964','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1019',null,null,now())
                    ,(null,'mac123','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3965','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1020',null,null,now())
                    ,(null,'chamchi','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3966','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1021',null,null,now())
                    ,(null,'ilhase','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3967','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1022',null,null,now())
                    ,(null,'chamchi','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3968','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1023',null,null,now())
                    ,(null,'ilhase','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3969','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1024',null,null,now())
                    ,(null,'chamchi','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3970','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1025',null,null,now())
                    ,(null,'chocolate1','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3971','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1026',null,null,now())
                    ,(null,'celestial','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3972','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1027',null,null,now())
                    ,(null,'starbucks','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3973','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1028',null,null,now())
                    ,(null,'mac123','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3974','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1029',null,null,now())
                    ,(null,'chamchi','웹 개발/자바 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3975','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'무관','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1030',null,null,now())
                    ,(null,'ilhase','웹 개발/프론트엔드','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3976','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전남 무안군 삼향읍 남악리 1031',null,null,now())
                    ,(null,'chamchi','웹 개발/프론트엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3977','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','서울 성동구 도선동 39-1',null,null,now())
                    ,(null,'ilhase','웹 개발/프론트엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3978','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경기 성남시 분당구 백현동 19-2',null,null,now())
                    ,(null,'chamchi','웹 개발/프론트엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3979','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전북 전주시 완산구 서노송동 568-1',null,null,now())
                    ,(null,'chocolate1','웹 개발/프론트엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3980','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','강원 춘천시 명동길 2',null,null,now())
                    ,(null,'celestial','웹 개발/프론트엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3981','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충북 제천시 청풍면 물태리 98-2',null,null,now())
                    ,(null,'starbucks','웹 개발/프론트엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3982','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충남 보령시 신흑동 2267-3',null,null,now())
                    ,(null,'mac123','웹 개발/프론트엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3983','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','세종특별자치시 전동면 송성리 9',null,null,now())
                    ,(null,'chamchi','웹 개발/프론트엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3984','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경북 경주시 산내면 내칠리 715',null,null,now())
                    ,(null,'ilhase','웹 개발/프론트엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3985','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','서울 성동구 도선동 39-1',null,null,now())
                    ,(null,'chamchi','웹 개발/프론트엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3986','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경기 성남시 분당구 백현동 19-2',null,null,now())
                    ,(null,'ilhase','웹 개발/프론트엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3987','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전북 전주시 완산구 서노송동 568-1',null,null,now())
                    ,(null,'chamchi','웹 개발/프론트엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3988','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','강원 춘천시 명동길 2',null,null,now())
                    ,(null,'chocolate1','웹 개발/프론트엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3989','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충북 제천시 청풍면 물태리 98-2',null,null,now())
                    ,(null,'celestial','웹 개발/프론트엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3990','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충남 보령시 신흑동 2267-3',null,null,now())
                    ,(null,'starbucks','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3991','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','세종특별자치시 전동면 송성리 9',null,null,now())
                    ,(null,'mac123','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3992','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경북 경주시 산내면 내칠리 715',null,null,now())
                    ,(null,'chamchi','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3993','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','서울 성동구 도선동 39-1',null,null,now())
                    ,(null,'ilhase','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3994','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경기 성남시 분당구 백현동 19-2',null,null,now())
                    ,(null,'chamchi','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3995','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전북 전주시 완산구 서노송동 568-1',null,null,now())
                    ,(null,'ilhase','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3996','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','강원 춘천시 명동길 2',null,null,now())
                    ,(null,'chamchi','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3997','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충북 제천시 청풍면 물태리 98-2',null,null,now())
                    ,(null,'chocolate1','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3998','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충남 보령시 신흑동 2267-3',null,null,now())
                    ,(null,'celestial','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-3999','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','세종특별자치시 전동면 송성리 9',null,null,now())
                    ,(null,'starbucks','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4000','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경북 경주시 산내면 내칠리 715',null,null,now())
                    ,(null,'mac123','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4001','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','제주특별자치도 제주시 용담이동 2002',null,null,now())
                    ,(null,'chamchi','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4002','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','서울 성동구 도선동 39-1',null,null,now())
                    ,(null,'ilhase','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4003','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경기 성남시 분당구 백현동 19-2',null,null,now())
                    ,(null,'chamchi','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4004','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전북 전주시 완산구 서노송동 568-1',null,null,now())
                    ,(null,'ilhase','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4005','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','강원 춘천시 명동길 2',null,null,now())
                    ,(null,'chamchi','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4006','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충북 제천시 청풍면 물태리 98-2',null,null,now())
                    ,(null,'chamchi','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4007','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충남 보령시 신흑동 2267-3',null,null,now())
                    ,(null,'chamchi','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4008','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','세종특별자치시 전동면 송성리 9',null,null,now())
                    ,(null,'chocolate1','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4009','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경북 경주시 산내면 내칠리 715',null,null,now())
                    ,(null,'celestial','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4010','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','서울 성동구 도선동 39-1',null,null,now())
                    ,(null,'starbucks','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4011','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경기 성남시 분당구 백현동 19-2',null,null,now())
                    ,(null,'mac123','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4012','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전북 전주시 완산구 서노송동 568-1',null,null,now())
                    ,(null,'chamchi','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4013','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','강원 춘천시 명동길 2',null,null,now())
                    ,(null,'ilhase','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4014','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충북 제천시 청풍면 물태리 98-2',null,null,now())
                    ,(null,'chamchi','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4015','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충남 보령시 신흑동 2267-3',null,null,now())
                    ,(null,'ilhase','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4016','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','세종특별자치시 전동면 송성리 9',null,null,now())
                    ,(null,'chamchi','웹 개발/백엔드 강사','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4017','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경북 경주시 산내면 내칠리 715',null,null,now())
                    ,(null,'chocolate1','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4018','recruit@ilhase.co ','www.ilhase.com','안내/접수/상담 안내원',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','서울 성동구 도선동 39-1',null,null,now())
                    ,(null,'celestial','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4019','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경기 성남시 분당구 백현동 19-2',null,null,now())
                    ,(null,'starbucks','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4020','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전북 전주시 완산구 서노송동 568-1',null,null,now())
                    ,(null,'mac123','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4021','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','강원 춘천시 명동길 2',null,null,now())
                    ,(null,'chamchi','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4022','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충북 제천시 청풍면 물태리 98-2',null,null,now())
                    ,(null,'ilhase','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4023','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충남 보령시 신흑동 2267-3',null,null,now())
                    ,(null,'chamchi','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4024','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','세종특별자치시 전동면 송성리 9',null,null,now())
                    ,(null,'ilhase','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4025','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경북 경주시 산내면 내칠리 715',null,null,now())
                    ,(null,'chamchi','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4026','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','제주특별자치도 제주시 용담이동 2002',null,null,now())
                    ,(null,'chocolate1','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4027','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','서울 성동구 도선동 39-1',null,null,now())
                    ,(null,'celestial','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4028','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경기 성남시 분당구 백현동 19-2',null,null,now())
                    ,(null,'starbucks','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4029','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전북 전주시 완산구 서노송동 568-1',null,null,now())
                    ,(null,'mac123','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4030','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','강원 춘천시 명동길 2',null,null,now())
                    ,(null,'chamchi','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4031','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충북 제천시 청풍면 물태리 98-2',null,null,now())
                    ,(null,'ilhase','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4032','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충남 보령시 신흑동 2267-3',null,null,now())
                    ,(null,'chamchi','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4033','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','세종특별자치시 전동면 송성리 9',null,null,now())
                    ,(null,'ilhase','퀵서비스 배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4034','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 퀵서비스',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경북 경주시 산내면 내칠리 715',null,null,now())
                    ,(null,'chamchi','퀵서비스 배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4035','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 퀵서비스',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','서울 성동구 도선동 39-1',null,null,now())
                    ,(null,'chocolate1','퀵서비스 배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4036','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 퀵서비스',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경기 성남시 분당구 백현동 19-2',null,null,now())
                    ,(null,'celestial','퀵서비스 배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4037','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 퀵서비스',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전북 전주시 완산구 서노송동 568-1',null,null,now())
                    ,(null,'starbucks','퀵서비스 배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4038','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 퀵서비스',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','강원 춘천시 명동길 2',null,null,now())
                    ,(null,'mac123','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4039','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 퀵서비스',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충북 제천시 청풍면 물태리 98-2',null,null,now())
                    ,(null,'chamchi','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4040','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 퀵서비스',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충남 보령시 신흑동 2267-3',null,null,now())
                    ,(null,'ilhase','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4041','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 퀵서비스',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','세종특별자치시 전동면 송성리 9',null,null,now())
                    ,(null,'chamchi','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4042','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 퀵서비스',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경북 경주시 산내면 내칠리 715',null,null,now())
                    ,(null,'ilhase','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4043','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 퀵서비스',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','서울 성동구 도선동 39-1',null,null,now())
                    ,(null,'chamchi','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4044','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 퀵서비스',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경기 성남시 분당구 백현동 19-2',null,null,now())
                    ,(null,'chocolate1','배달원 급구','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4045','recruit@ilhase.co ','www.ilhase.com','배달/운전/택배 퀵서비스',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전북 전주시 완산구 서노송동 568-1',null,null,now())
                    ,(null,'celestial','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4046','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','강원 춘천시 명동길 2',null,null,now())
                    ,(null,'starbucks','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4047','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충북 제천시 청풍면 물태리 98-2',null,null,now())
                    ,(null,'mac123','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4048','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충남 보령시 신흑동 2267-3',null,null,now())
                    ,(null,'chamchi','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4049','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','세종특별자치시 전동면 송성리 9',null,null,now())
                    ,(null,'ilhase','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4050','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경북 경주시 산내면 내칠리 715',null,null,now())
                    ,(null,'chamchi','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4051','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','제주특별자치도 제주시 용담이동 2002',null,null,now())
                    ,(null,'ilhase','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4052','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','서울 성동구 도선동 39-1',null,null,now())
                    ,(null,'chamchi','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4053','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경기 성남시 분당구 백현동 19-2',null,null,now())
                    ,(null,'chocolate1','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4054','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전북 전주시 완산구 서노송동 568-1',null,null,now())
                    ,(null,'celestial','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4055','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','강원 춘천시 명동길 2',null,null,now())
                    ,(null,'starbucks','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4056','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충북 제천시 청풍면 물태리 98-2',null,null,now())
                    ,(null,'mac123','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4057','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충남 보령시 신흑동 2267-3',null,null,now())
                    ,(null,'chamchi','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4058','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','세종특별자치시 전동면 송성리 9',null,null,now())
                    ,(null,'ilhase','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4059','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경북 경주시 산내면 내칠리 715',null,null,now())
                    ,(null,'chamchi','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4060','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','서울 성동구 도선동 39-1',null,null,now())
                    ,(null,'ilhase','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4061','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경기 성남시 분당구 백현동 19-2',null,null,now())
                    ,(null,'chamchi','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4062','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전북 전주시 완산구 서노송동 568-1',null,null,now())
                    ,(null,'chocolate1','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4063','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','강원 춘천시 명동길 2',null,null,now())
                    ,(null,'celestial','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4064','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충북 제천시 청풍면 물태리 98-2',null,null,now())
                    ,(null,'starbucks','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4065','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충남 보령시 신흑동 2267-3',null,null,now())
                    ,(null,'mac123','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4066','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','세종특별자치시 전동면 송성리 9',null,null,now())
                    ,(null,'chamchi','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4067','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경북 경주시 산내면 내칠리 715',null,null,now())
                    ,(null,'ilhase','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4068','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','서울 성동구 도선동 39-1',null,null,now())
                    ,(null,'chamchi','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4069','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경기 성남시 분당구 백현동 19-2',null,null,now())
                    ,(null,'ilhase','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4070','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','전북 전주시 완산구 서노송동 568-1',null,null,now())
                    ,(null,'chamchi','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4071','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','강원 춘천시 명동길 2',null,null,now())
                    ,(null,'chocolate1','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4072','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충북 제천시 청풍면 물태리 98-2',null,null,now())
                    ,(null,'celestial','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4073','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','충남 보령시 신흑동 2267-3',null,null,now())
                    ,(null,'starbucks','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4074','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','세종특별자치시 전동면 송성리 9',null,null,now())
                    ,(null,'mac123','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4075','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','경북 경주시 산내면 내칠리 715',null,null,now())
                    ,(null,'chamchi','웹 마스터로 가는 길 안내','저희는 이런 회사예요\\n100세까지 일하세! 일하세는 노인 인력시장의 활기를 지향합니다. 노인 인력이 낭비되는 것을 막기 위해 최적의 구인 공고와 인재를 찾을 수 있도록 서비스를 제공합니다.\\n\\n이런 사람을 원해요\\n노인을 위한 서비스인만큼 노인을 잘 이해할 수 있는 분들을 원해요\\n\\n이런 환경에서 일해요\\n 아늑한 사무실에서 사이트 버그 잡아주실분 … 사이트 최적화 해주실 분 … 따뜻한 커피를 제공해드려요','김채용','010-7722-4076','recruit@ilhase.co ','www.ilhase.com','공공/전문 교육/강사/해설사',2,'경력','무관','연봉 4000만원','정규직','2020-02-24','2020-03-29','제주특별자치도 제주시 용담이동 2002',null,null,now());
                ";
                break;

            case 'apply' :
                $sql = "insert into `apply` values (null, '기본 이력서', '250', '4jo4jo', now()),
                (null, '기본 이력서', '250', 'test12', now()),
                (null, '기본 이력서', '250', 'test12', now()),
                (null, '기본 이력서', '250', 'test12', now()),
                (null, '기본 이력서', '250', 'test12', now()),
                (null, '기본 이력서', '210', 'test12', now()),
                (null, '기본 이력서', '211', 'ksj123', now()),
                (null, '기본 이력서', '211', 'ksj123', now()),
                (null, '기본 이력서', '251', 'ksj123', now()),
                (null, '기본 이력서', '251', 'fruit', now()),
                (null, '기본 이력서', '251', 'fruit', now()),
                (null, '기본 이력서', '351', 'fruit', now()),
                (null, '기본 이력서', '151', 'fruit', now()),
                (null, '기본 이력서', '151', 'fruit', now()),
                (null, '기본 이력서', '150', 'ator', now()),
                (null, '기본 이력서', '150', 'ator', now()),
                (null, '기본 이력서', '150', 'ator', now()),
                (null, '기본 이력서', '153', 'ator', now()),
                (null, '기본 이력서', '153', 'ator', now()),
                (null, '기본 이력서', '153', 'ator', now()),
                (null, '기본 이력서', '153', 'ator', now()),
                (null, '기본 이력서', '153', 'ator', now()),
                (null, '기본 이력서', '353', 'ator', now()),
                (null, '기본 이력서', '350', 'ator', now()),
                (null, '기본 이력서', '230', 'ator', now()),
                (null, '기본 이력서', '230', '4jo4jo', now()),
                (null, '기본 이력서', '234', '4jo4jo', now()),
                (null, '기본 이력서', '234', '4jo4jo', now()),
                (null, '기본 이력서', '254', '4jo4jo', now()),
                (null, '기본 이력서', '254', '4jo4jo', now()),
                (null, '기본 이력서', '254', '4jo4jo', now()),
                (null, '기본 이력서', '254', '4jo4jo', now()),
                (null, '기본 이력서', '230', '4jo4jo', now()),
                (null, '기본 이력서', '230', '4jo4jo', now()),
                (null, '기본 이력서', '350', '4jo4jo', now())";
                break;

            case 'favorite' :
                $sql = "insert into `favorite` values (null, '340', '4jo4jo'),
                    (null, '90', '4jo4jo'),
                    (null, '91', '4jo4jo'),
                    (null, '276', '4jo4jo'),
                    (null, '244', '4jo4jo'),
                    (null, '268', '4jo4jo'),
                    (null, '164', '4jo4jo'),
                    (null, '241', 'test12'),
                    (null, '142', 'test12'),
                    (null, '143', 'test12'),
                    (null, '244', '4jo4jo')";
                break;

            case 'notice' :
                $sql = "insert into `notice` values (null, '홈페이지 오픈', '많이 이용해주세요', null, null, null, 0, now())";
                break;

            case 'notification' :
                $sql = "insert into notification values (null, '홈페이지를 새롭게 오픈하였습니다','테스트용 알람입니다', now(), 0, '4jo4jo')";
                break;

            case 'recruit_plan' :
                $sql = "insert into `recruit_plan` values (null, 'small plan', '10', '49000'),
                (null, 'basic plan', '50', '229000'),
                (null, 'large plan', '100', '459000'),
                (null, 'super plan', '300', '1119000')";
                break;
                
            case 'qna' :
                $sql = "insert into `qna` values (null, 1, 0, 0, '4jo4jo', '김사조', '질문 있어요', '질문 없어요', 0, '2020-02-11 (12:33)');";
                break;
            
            case 'purchase' :
                $sql = "insert into `purchase` values (null, '2019-09-20 11:11:23', 'chamchi', '5', 'small plan', 8, '49900', '카카오페이'),
                (null, '2019-09-20 00:11:23', 'chamchi', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-09-20 11:31:23', 'chamchi', '6', 'basic plan', 8,  '229000', '카카오페이'),
                (null, '2019-12-20 11:19:23', 'chamchi', '8', 'super plan', 8,  '1119000', '카카오페이'),
                (null, '2019-09-20 11:02:23', 'chamchi', '7', 'large plan', 8,  '459000', '카카오페이'),
                (null, '2019-09-20 11:11:23', 'allan54', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-11-20 08:11:53', 'chamchi', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-11-20 11:11:23', 'chamchi', '6', 'basic plan', 8,  '229000', '카카오페이'),
                (null, '2019-11-20 12:11:23', 'ilhase', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-09-20 11:11:25', 'ilhase', '6', 'basic plan', 8,  '229000', '카카오페이'),
                (null, '2019-09-20 00:11:23', 'ilhase', '6', 'basic plan', 8,  '229000', '카카오페이'),
                (null, '2019-12-20 11:15:53', 'ilhase', '7', 'large plan', 8,  '459000', '카카오페이'),
                (null, '2019-12-20 09:15:27', 'jessica90', '7', 'large plan', 8,  '459000', '카카오페이'),
                (null, '2019-09-20 11:35:23', 'ilhase', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-10-20 11:35:23', 'ilhase', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-10-20 11:31:28', 'starbucks', '8', 'super plan', 8,  '1119000', '카카오페이'),
                (null, '2019-10-20 11:31:43', 'celestial', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2020-01-20 11:02:23', 'chamchi', '7', 'large plan', 8,  '459000', '카카오페이'),
                (null, '2020-01-23 11:11:23', 'allan54', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2020-01-03 08:11:53', 'chamchi', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2020-01-13 11:11:23', 'chamchi', '6', 'basic plan', 8,  '229000', '카카오페이'),
                (null, '2020-01-19 12:11:23', 'ilhase', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2020-02-17 11:11:25', 'ilhase', '6', 'basic plan', 8,  '229000', '카카오페이'),
                (null, '2020-02-27 00:11:23', 'ilhase', '6', 'basic plan', 8,  '229000', '카카오페이'),
                (null, '2020-02-27 11:15:53', 'ilhase', '8', 'super plan', 8,  '1119000', '카카오페이'),
                (null, '2020-02-27 09:15:27', 'jessica90', '8', 'super plan', 8,  '1119000', '카카오페이'),
                (null, '2020-02-17 09:15:27', 'jessica90', '7', 'large plan', 8,  '459000', '카카오페이'),
                (null, '2020-02-07 09:15:27', 'jessica90', '7', 'large plan', 8,  '459000', '카카오페이'),
                (null, '2020-02-05 09:15:27', 'jessica90', '7', 'large plan', 8,  '459000', '카카오페이'),
                (null, '2020-01-23 11:35:23', 'ilhase', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-10-20 11:35:23', 'ilhase', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-10-20 11:31:28', 'starbucks', '7', 'large plan', 8,  '459000', '카카오페이'),
                (null, '2019-10-20 11:31:43', 'celestial', '8', 'super plan', 8,  '1119000', '카카오페이'),
                (null, '2019-09-20 07:11:29', 'celestial', '6', 'basic plan', 8,  '229000', '카카오페이'),
                (null, '2019-12-20 11:11:23', 'celestial', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-12-20 11:11:23', 'celestial', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-11-20 12:11:23', 'ilhase', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-11-20 12:11:23', 'ilhase', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-11-20 12:11:23', 'ilhase', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-11-20 12:11:23', 'ilhase', '6', 'basic plan', 8,  '49900', '카카오페이'),
                (null, '2019-11-20 12:11:23', 'starbucks', '7', 'large plan', 8,  '459000', '카카오페이'),
                (null, '2019-11-20 12:11:23', 'celestial', '6', 'basic plan', 8,  '229000', '카카오페이'),
                (null, '2019-11-20 12:11:23', 'ilhase', '6', 'basic plan', 8,  '229000', '카카오페이'),
                (null, '2019-11-20 12:11:23', 'ilhase', '6', 'basic plan', 8,  '229000', '카카오페이'),
                (null, '2019-11-20 12:11:23', 'celestial', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-11-20 12:11:23', 'chamchi', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-09-20 11:51:23', 'celestial', '6', 'basic plan', 8,  '229000', '카카오페이'),
                (null, '2019-09-20 00:51:53', 'ilhase', '6', 'basic plan', 8,  '229000', '카카오페이'),
                (null, '2019-09-20 11:51:23', 'ilhase', '8', 'super plan', 8,  '1119000', '카카오페이'),
                (null, '2019-09-20 09:51:23', 'allan54', '7', 'large plan', 8,  '459000', '카카오페이'),
                (null, '2019-09-20 11:51:23', 'mrazena', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-10-20 11:51:53', 'ilhase', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-10-20 11:11:43', 'starbucks', '5', 'small plan', 8,  '459000', '카카오페이'),
                (null, '2019-10-20 11:11:43', 'celestial', '5', 'small plan', 8,  '459000', '카카오페이'),
                (null, '2019-09-20 07:11:26', 'celestial', '6', 'basic plan', 8,  '229000', '카카오페이'),
                (null, '2019-12-20 11:11:26', 'celestial', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-11-20 12:11:16', 'ilhase', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-09-20 11:11:23', 'ilhase', '6', 'basic plan', 8,  '229000', '카카오페이'),
                (null, '2019-09-20 00:11:23', 'mrazena', '6', 'basic plan', 8,  '229000', '카카오페이'),
                (null, '2019-09-20 11:11:03', 'jessica90', '5', 'small plan',  8, '49900', '카카오페이'),
                (null, '2019-09-20 09:11:23', 'ilhase', '7', 'large plan', 8,  '459000', '카카오페이'),
                (null, '2019-09-20 11:41:03', 'allan54', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-10-20 11:11:23', 'jessica90', '5', 'small plan', 8,  '49900', '카카오페이'),
                (null, '2019-10-20 11:51:23', 'starbucks', '7', 'large plan', 8,  '459000', '카카오페이'),
                (null, '2019-10-20 11:11:23', 'celestial', '8', 'super plan', 8,  '1119000', '카카오페이'),
                (null, '2019-09-20 07:11:23', 'jessica90', '6', 'basic plan', 8,  '229000', '카카오페이'),
                (null, '2019-12-20 11:11:23', 'celestial', '5', 'small plan', 8,  '49900', '카카오페이')";
                break;

            case 'resume' :
                $sql = "INSERT INTO `resume` VALUES (null, 0, '4jo4jo', '김사조', 'example@test.com', '서울 성동구 행당동 286-16', '여', '1968-01-01', '010-1234-5678', '기본 이력서', '안녕하세요? 성실하면 김사조입니다.', 
                null, null, null, null, null, now());";
                break;
            
            case 'address' :
                $sql = "
                insert into `address` values (null, '서울', '서울 전체')
                ,(null, '서울', '강남구')
                ,(null, '서울', '강동구')
                ,(null, '서울', '강북구')
                ,(null, '서울', '강서구')
                ,(null, '서울', '관악구')
                ,(null, '서울', '노원구')
                ,(null, '서울', '도봉구')
                ,(null, '서울', '동대문구')
                ,(null, '서울', '동작구')
                ,(null, '서울', '서대문구')
                ,(null, '서울', '서초구')
                ,(null, '서울', '마포구')
                ,(null, '서울', '종로구')
                ,(null, '서울', '성동구')
                
                ,(null, '서울', '성북구')
                ,(null, '강원', '강릉시')
                ,(null, '서울', '송파구')
                ,(null, '강원', '고성군')
                ,(null, '서울', '양천구')
                ,(null, '강원', '삼척시')
                ,(null, '서울', '영등포구')
                ,(null, '강원', '양구군')
                ,(null, '서울', '용산구')
                ,(null, '강원', '원주시')
                ,(null, '서울', '은평구')
                ,(null, '강원', '인제군')
                ,(null, '서울', '중랑구')
                ,(null, '강원', '철원군')
                ,(null, '강원', '강원 전체')
                ,(null, '강원', '태백시')
                ,(null, '강원', '홍천군')
                ,(null, '강원', '화천군')
                ,(null, '강원', '동해시')
                
                ,(null, '강원', '속초시')
                ,(null, '경기', '가평군')
                ,(null, '강원', '양양군')
                ,(null, '경기', '고양시 덕양구')
                ,(null, '강원', '영월군')
                ,(null, '경기', '고양시 일산서구')
                ,(null, '강원', '정선군')
                ,(null, '경기', '광명시')
                ,(null, '강원', '춘천시')
                ,(null, '경기', '구리시')
                ,(null, '강원', '평창군')
                ,(null, '경기', '김포시')
                ,(null, '강원', '횡성군')
                ,(null, '경기', '동두천시')
                ,(null, '경기', '경기 전체')
                ,(null, '경기', '부천시 소사구')
                ,(null, '경기', '고양시')
                ,(null, '경기', '부천시 원미구')
                ,(null, '경기', '고양시 일산동구')
                ,(null, '경기', '성남시 분당구')
                ,(null, '경기', '과천시')
                ,(null, '경기', '광주시')
                ,(null, '경기', '군포시')
                ,(null, '경기', '남양주시')
                ,(null, '경기', '부천시')
                ,(null, '경기', '부천시 오정구')
                ,(null, '경기', '성남시')
                ,(null, '경기', '성남시 수정구')
                ,(null, '경기', '성남시 중원구')
                ,(null, '경기', '수원시')
                ,(null, '경기', '수원시 권선구')
                ,(null, '경기', '수원시 영통구')
                ,(null, '경기', '수원시 장안구')
                ,(null, '경기', '수원시 팔달구')
                ,(null, '경기', '시흥시')
                ,(null, '경기', '안산시')
                ,(null, '경기', '안산시 단원구')
                ,(null, '경기', '안산시 상록구')
                ,(null, '경기', '안성시')
                ,(null, '경기', '안양시')
                ,(null, '경기', '안양시 동안구')
                ,(null, '경기', '안양시 만안구')
                ,(null, '경기', '양주시')
                ,(null, '경기', '양평군')
                ,(null, '경기', '여주시')
                ,(null, '경기', '연천군')
                ,(null, '경기', '오산시')
                ,(null, '경기', '용인시')
                ,(null, '경기', '용인시 기흥구')
                ,(null, '경기', '용인시 수지구')
                ,(null, '경기', '용인시 처인구')
                ,(null, '경기', '의왕시')
                ,(null, '경기', '의정부시')
                ,(null, '경기', '이천시')
                ,(null, '경기', '파주시')
                ,(null, '경기', '평택시')
                ,(null, '경기', '포천시')
                ,(null, '경기', '하남시')
                ,(null, '경기', '화성시')
            
                ,(null, '경남', '경남 전체')
                ,(null, '경남', '거제시')
                ,(null, '경남', '거창군')
                ,(null, '경남', '고성군')
                ,(null, '경남', '김해시')
                ,(null, '경남', '남해군')
                ,(null, '경남', '밀양시')
                ,(null, '경남', '사천시')
                ,(null, '경남', '산청군')
                ,(null, '경남', '양산시')
                ,(null, '경남', '의령군')
                ,(null, '경남', '진주시')
                ,(null, '경남', '창녕군')
                ,(null, '경남', '창원시')
                ,(null, '경남', '창원시 마산합포구')
                ,(null, '경남', '창원시 마산회원구')
                ,(null, '경남', '창원시 성산구')
                ,(null, '경남', '창원시 의창구')
                ,(null, '경남', '창원시 진해구')
                ,(null, '경남', '통영시')
                ,(null, '경남', '하동군')
                ,(null, '경남', '함안군')
                ,(null, '경남', '함양군')
                ,(null, '경남', '합천군')
            
                ,(null, '경북', '경북 전체')
                ,(null, '경북', '경산시')
                ,(null, '경북', '경주시')
                ,(null, '경북', '고령군')
                ,(null, '경북', '구미시')
                ,(null, '경북', '군위군')
                ,(null, '경북', '김천시')
                ,(null, '경북', '문경시')
                ,(null, '경북', '봉화군')
                ,(null, '경북', '상주시')
                ,(null, '경북', '성주군')
                ,(null, '경북', '안동시')
                ,(null, '경북', '영덕군')
                ,(null, '경북', '영양군')
                ,(null, '경북', '영주시')
                ,(null, '경북', '영천시')
                ,(null, '경북', '예천군')
                ,(null, '경북', '울릉군')
                ,(null, '경북', '울진군')
                ,(null, '경북', '의성군')
                ,(null, '경북', '청도군')
                ,(null, '경북', '청송군')
                ,(null, '경북', '칠곡군')
                ,(null, '경북', '포항시')
                ,(null, '경북', '포항시 남구')
                ,(null, '경북', '포항시 북구')
            
                ,(null, '광주', '광주 전체')
                ,(null, '광주', '광산구')
                ,(null, '광주', '남구')
                ,(null, '광주', '동구')
                ,(null, '광주', '북구')
                ,(null, '광주', '서구')
            
                ,(null, '대구', '대구 전체')
                ,(null, '대구', '남구')
                ,(null, '대구', '달서구')
                ,(null, '대구', '달성군')
                ,(null, '대구', '동구')
                ,(null, '대구', '북구')
                ,(null, '대구', '서구')
                ,(null, '대구', '수성구')
                ,(null, '대구', '중구')
            
                ,(null, '대전', '대전 전체')
                ,(null, '대전', '대덕구')
                ,(null, '대전', '동구')
                ,(null, '대전', '서구')
                ,(null, '대전', '유성구')
                ,(null, '대전', '중구')
            
                ,(null, '부산', '부산 전체')
                ,(null, '부산', '강서구')
                ,(null, '부산', '금정구')
                ,(null, '부산', '기장군')
                ,(null, '부산', '남구')
                ,(null, '부산', '동구')
                ,(null, '부산', '동래구')
                ,(null, '부산', '부산진구')
                ,(null, '부산', '북구')
                ,(null, '부산', '사상구')
                ,(null, '부산', '사하구')
                ,(null, '부산', '서구')
                ,(null, '부산', '수영구')
                ,(null, '부산', '연제구')
                ,(null, '부산', '영도구')
                ,(null, '부산', '중구')
                ,(null, '부산', '해운대구')
            
                ,(null, '울산', '울산 전체')
                ,(null, '울산', '남구')
                ,(null, '울산', '동구')
                ,(null, '울산', '북구')
                ,(null, '울산', '울주군')
                ,(null, '울산', '중구')
                
                ,(null, '인천', '인천 전체')
                ,(null, '인천', '강화군')
                ,(null, '인천', '계양구')
                ,(null, '인천', '남동구')
                ,(null, '인천', '동구')
                ,(null, '인천', '미추홀구')
                ,(null, '인천', '부평구')
                ,(null, '인천', '서구')
                ,(null, '인천', '연수구')
                ,(null, '인천', '옹진군')
                ,(null, '인천', '중구')
            
                ,(null, '전남', '전남 전체')
                ,(null, '전남', '강진군')
                ,(null, '전남', '고흥군')
                ,(null, '전남', '곡성군')
                ,(null, '전남', '구례군')
                ,(null, '전남', '나주시')
                ,(null, '전남', '담양군')
                ,(null, '전남', '목포시')
                ,(null, '전남', '무안군')
                ,(null, '전남', '보성군')
                ,(null, '전남', '순천시')
                ,(null, '전남', '신안군')
                ,(null, '전남', '여수시')
                ,(null, '전남', '영광군')
                ,(null, '전남', '장흥군')
                ,(null, '전남', '진도군')
                ,(null, '전남', '함평군')
                ,(null, '전남', '해남군')
                ,(null, '전남', '화순군')
            
                ,(null, '전북', '전북 전체')
                ,(null, '전북', '고창군')
                ,(null, '전북', '군산시')
                ,(null, '전북', '김제시')
                ,(null, '전북', '남원시')
                ,(null, '전북', '무주군')
                ,(null, '전북', '부안군')
                ,(null, '전북', '순창군')
                ,(null, '전북', '완주군')
                ,(null, '전북', '익산시')
                ,(null, '전북', '임실군')
                ,(null, '전북', '장수군')
                ,(null, '전북', '전주시')
                ,(null, '전북', '전주시 덕진구')
                ,(null, '전북', '전주시 완산구')
                ,(null, '전북', '정읍시')
                ,(null, '전북', '진안군')
            
                ,(null, '제주', '제주 전체')
                ,(null, '제주', '서귀포시')
                ,(null, '제주', '제주시')
                
                ,(null, '충남', '충남 전체')
                ,(null, '충남', '계룡시')
                ,(null, '충남', '공주시')
                ,(null, '충남', '금산군')
                ,(null, '충남', '논산시')
                ,(null, '충남', '당진시')
                ,(null, '충남', '보령시')
                ,(null, '충남', '부여군')
                ,(null, '충남', '서산시')
                ,(null, '충남', '서천군')
                ,(null, '충남', '아산시')
                ,(null, '충남', '연기군')
                ,(null, '충남', '예산군')
                ,(null, '충남', '천안시')
                ,(null, '충남', '천안시 동남구')
                ,(null, '충남', '천안시 서북구')
                ,(null, '충남', '청양군')
                ,(null, '충남', '태안군')
                ,(null, '충남', '홍성군')
            
                ,(null, '충북', '충북 전체')
                ,(null, '충북', '괴산군')
                ,(null, '충북', '단양군')
                ,(null, '충북', '보은군')
                ,(null, '충북', '영동군')
                ,(null, '충북', '옥천군')
                ,(null, '충북', '음성군')
                ,(null, '충북', '제천시')
                ,(null, '충북', '증평군')
                ,(null, '충북', '진천군')
                ,(null, '충북', '청원군')
                ,(null, '충북', '청주시')
                ,(null, '충북', '청주시 상당구')
                ,(null, '충북', '청주시 서원구')
                ,(null, '충북', '청주시 청원구')
                ,(null, '충북', '청주시 흥덕구')
                ,(null, '충북', '충주시')
            
                ,(null, '세종', '세종특별자치시');";

                break;

            case 'job_industry':
                $sql = "
                insert into `job_industry` values (null, '생산/제조/단순노무', '생산/제조')
                ,(null, '생산/제조/단순노무', '조립/포장')
                ,(null, '생산/제조/단순노무', '영업/판매')
                ,(null, '생산/제조/단순노무', '제품 검사')
                ,(null, '생산/제조/단순노무', '사무 보조')
                ,(null, '생산/제조/단순노무', '농림 어업')
                ,(null, '생산/제조/단순노무', '기타')
                        
                ,(null, '경비/시설관리', '경비원')
                ,(null, '경비/시설관리', '건물/시설관리')
                ,(null, '경비/시설관리', '주차 관리')
                ,(null, '경비/시설관리', '안전 점검원')
                        
                ,(null, '청소/미화', '청소원')
                ,(null, '청소/미화', '아파트 청소')
                ,(null, '청소/미화', '건물/모텔 청소')
                ,(null, '청소/미화', '환경 미화')
                ,(null, '청소/미화', '세차/세탁')
                ,(null, '청소/미화', '방역')
                        
                ,(null, '도우미', '가사도우미')
                ,(null, '도우미', '요양/간병')
                ,(null, '도우미', '산후조리')
                ,(null, '도우미', '육아/보육')
                ,(null, '도우미', '학교/병원급식')
                ,(null, '도우미', '문화시설')
                        
                ,(null, '음식점/마트/주유', '주방')
                ,(null, '음식점/마트/주유', '서빙')
                ,(null, '음식점/마트/주유', '편의점/마트')
                ,(null, '음식점/마트/주유', '매표소/카운터')
                ,(null, '음식점/마트/주유', '주유')
                ,(null, '음식점/마트/주유', '커피숍/바리스타')
                        
                ,(null, '배달/운전/택배', '배달')
                ,(null, '배달/운전/택배', '택배')
                ,(null, '배달/운전/택배', '퀵서비스')
                ,(null, '배달/운전/택배', '운전')
                ,(null, '배달/운전/택배', '운송')
                        
                ,(null, '안내/접수/상담', '안내원')
                ,(null, '안내/접수/상담', '접수/예약')
                ,(null, '안내/접수/상담', '상담원')
                        
                ,(null, '공공/전문', '교육/강사/해설사')
                ,(null, '공공/전문', '교통/생활지도')
                ,(null, '공공/전문', '리서치/설문')
                ,(null, '공공/전문', '번역')
                ,(null, '공공/전문', '문화예술')
                ,(null, '공공/전문', '기타')
                        
                ,(null, '취업창업형(시장형)', '공동작업형 사업')
                ,(null, '취업창업형(시장형)', '제조 판매형')
                ,(null, '취업창업형(시장형)', '노노케어')
                ,(null, '취업창업형(시장형)', '취약계층 지원봉사')
                ,(null, '취업창업형(시장형)', '공공시설 지원봉사')
                ,(null, '취업창업형(시장형)', '경륜전수 지원봉사');";
                
            default:
                // 존재하지 않는 테이블명일 때
                echo "<script>alert('존재하지 않는 테이블명 입니다.');</script>";
                break;
        } // end of switch

        if(mysqli_query($conn, $sql)){
        // echo "<script>alert('$table_name 테이블 초기값 셋팅 완료');</script>";
        } else {
        echo $table_name." insert_init_data error ".mysqli_error($conn);
        }
    } // end of if table is empty

} // end of function
?>
