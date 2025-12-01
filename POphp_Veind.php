<!DOCTYPE html>
<html>
    <head>
        <title>PO php</title>
        <!--<link rel="icon" href="new.png" type="image/png" sizes="32x32">-->
        <!-- commentaar html -->
        <style>
            html, body {
                overflow: hidden;
                height: 100%;
                margin: 0;
                padding: 0;
                background-color: #404040;
            }

            .hidden {
                display: none !important;
                pointer-events: none !important;
            }

            .accounticon{
                padding: 0;
                line-height: 0;
                position: absolute;
                z-index: 11;
                top: 0%;
                left: 0%;
                width: 4vw;
                height: 4vw;
                border-radius: 50%;
                background-color: #808080;
                overflow: hidden;
                cursor: pointer;
            }
            .accounticon svg {
                isolation: isolate;
            }

            .profileicon{
                height: 100%;
                aspect-ratio: 1 / 1;
                border-radius: 50%;
                background-color: #808080;
                overflow: hidden;
            }
            .profileicon svg {
                isolation: isolate;
            }
            .profileicon:hover{
                overflow: visible;
            }

            .profile_settings {
                position: absolute;
                z-index: 10;
                top: 4.5%;
                left: 3%;
                width: 10vw;
                height: 20vw;
                background-color: #808080;
                border-radius: 0 12.5% 12.5% 12.5%;
                overflow: hidden;
                border: 1px solid black;
            }

            .profile_settings_item {
                height: 25%;
                background-color: #808080;
                border-bottom: 1px solid black;
                text-align: center;
                cursor:default;
                
                flex-shrink:0;
                display: flex;                /* enable flexbox */
                flex-direction: column;       /* stack text vertically */
                justify-content: center;      /* vertical centering */
                align-items: center;          /* horizontal centering */
                font-size:2.5vh;
            }
            .profile_settings_item:hover {
                background-color: #A0A0A0;
            }

            .navbar{
                background-color: #606060;
                border-bottom: 1px solid black;
                position: absolute;
                width: 100%;
                height: 10%;
                top:0;
                left:0;
            }

            .new_btn{
                position: absolute;
                top:2.5%;
                width: 4vw;
                height: 4vw;
                background-color: #808080;
                border-radius:50%;
                text-align: center;
                box-shadow: 2px 2px 2px #888888;
                cursor:pointer;
                font-size: 1vw;
            }

            .chat_btn{
                position: absolute;
                top:2.5%;
                left:86%;
                width: 4vw;
                height: 4vw;
                background-color: #808080;
                border-radius:50%;
                box-shadow: 2px 2px 2px #888888;
                cursor: pointer;
            }

            .searchbar {
                position: absolute;
                text-align:center;
                left:25%;
                width: 50%;
                background-color: #212121;
                top: 20%;
                height: 50%;
                box-shadow: none;
                border:none;
                border-radius:12.5%;
                transition: 0.5s;
            }

            .searchbar:focus {
                background-color: #212121;
                color: #4285f4;
                outline-style: none;
                outline-style: solid;
                outline-color: #4285f4;
                transition: 0.5s;
            }

            .profile_settings_page {
                background-color: #606060;
                position: absolute;
                width: 50%;
                left: 25%;
                top:10%;
                height:90%;
                border-radius:12.5%;
                overflow:hidden;
            }
            .profile_top_space{
                position:absolute;
                width: 100%;
                height:10%;
                top: 0%;
                background-color:transparent;
                border-bottom: 1px solid black;

                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                gap: 10px;
            }
            .profile_title{
                margin: 0;
                width:fit-content;
                font-size:3vw;
                text-align: center;
            }

            .profile_private_space{
                position:absolute;
                width: 100%;
                height: 10%;
                top: 20%;
                left: 0%;
                background-color:transparent;

                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                gap: 10px;
            }

            .profile_moderator_space{
                position:absolute;
                width: 100%;
                height: 10%;
                top: 10%;
                background-color:transparent;

                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                gap: 10px;
            }

            .profile_pfp_space{
                position:absolute;
                width: 100%;
                height: 10%;
                top: 30%;
                left: 0%;
                background-color:transparent;

                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                gap: 10px;
            }

            .profile_folder_space{
                position:absolute;
                width: 100%;
                height: 10%;
                top: 40%;
                left: 0%;
                background-color:transparent;

                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                gap: 10px;
            }

            .profile_paginas_space{
                position:absolute;
                width: 100%;
                height: 10%;
                top: 40%;
                left: 0%;
                background-color:transparent;

                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                gap: 10px;
            }

            .profile_afbeeldingen_space{
                position:absolute;
                width: 100%;
                height: 10%;
                top: 50%;
                left: 0%;
                background-color:transparent;

                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                gap: 10px;
            }

            /*checkboxes:*/
            .check {
                cursor: pointer;
                margin: auto;
                width: 1.5vw;
                height: 1.5vw;
                -webkit-tap-highlight-color: transparent;
                transform: translate3d(0, 0, 0);
            } /*Src: https://uiverse.io/mrhyddenn/slippery-bear-64*/

            .check:before {
                content: "";
                width: 3.5vw;
                height: 3.5vw;
                border-radius: 50%;
                background: rgba(34,50,84,0.03);
                opacity: 0;
                transition: opacity 0.2s ease;
            } /*Src: https://uiverse.io/mrhyddenn/slippery-bear-64*/

            .check svg {
                position: relative;
                z-index: 1;
                fill: none;
                stroke-linecap: round;
                stroke-linejoin: round;
                stroke: #c8ccd4;
                stroke-width: 1.5;
                transform: translate3d(0, 0, 0);
                transition: all 0.2s ease;
            } /*Src: https://uiverse.io/mrhyddenn/slippery-bear-64*/

            .check svg path {
                stroke-dasharray: 60;
                stroke-dashoffset: 0;
            } /*Src: https://uiverse.io/mrhyddenn/slippery-bear-64*/

            .check svg polyline {
                stroke-dasharray: 22;
                stroke-dashoffset: 66;
            } /*Src: https://uiverse.io/mrhyddenn/slippery-bear-64*/

            .check:hover:before {
                opacity: 1;
            } /*Src: https://uiverse.io/mrhyddenn/slippery-bear-64*/

            .check:hover svg {
                stroke: #4285f4;
            } /*Src: https://uiverse.io/mrhyddenn/slippery-bear-64*/

            .cbx_class:checked + .check svg {
                stroke: #4285f4;
            } /*Src: https://uiverse.io/mrhyddenn/slippery-bear-64*/

            .cbx_class:checked + .check svg path {
                stroke-dashoffset: 60;
                transition: all 0.3s linear;
            } /*Src: https://uiverse.io/mrhyddenn/slippery-bear-64*/

            .cbx_class:checked + .check svg polyline {
                stroke-dashoffset: 42;
                transition: all 0.2s linear;
                transition-delay: 0.15s;
            } /*Src: https://uiverse.io/mrhyddenn/slippery-bear-64*/

            .cbx_txt{
                font-size: 3.5vh;
                width:fit-content;
                text-align: center;
            }

            .image_page{
                background-color: #606060;
                position: absolute;
                width: 50%;
                left: 25%;
                top:10%;
                height:90%;
                border-radius:12.5%;
                overflow:hidden;
                display:flex;
                justify-content:center;
            }
            .image_image_page{
                background-color: transparent;
                width: 50%;
                height:100%;
                overflow-y:scroll;
                overflow-x:hidden;
                display:flex;
                flex-direction: column;
                align-items: center;
                gap: 5%;
            }
            .image_image_page::-webkit-scrollbar {
                width: 1vw; /* must specify width for vertical scrollbar */
            }
            .image_image_page::-webkit-scrollbar-track {
                background: transparent; /* invisible track */
            }
            .image_image_page::-webkit-scrollbar-thumb {
                background: #808080;   /* faint grey */
                border-radius: 4px;
            }
            .img_page_img {
                min-width:10%;
                max-width:100%;
                max-height:50%;
            }
            
            .new_page{
                background-color: #606060;
                position: absolute;
                width: 50%;
                left: 25%;
                top:10%;
                height:90%;
                border-radius:12.5%;
                overflow:hidden;
                display:flex;
                justify-content:center;
            }

            .title_edit{
                position: absolute;
                text-align:center;
                left:0;
                width: 100%;
                background-color: #707070;
                top: 0;
                height: 7.5%;
                box-shadow: none;
                border:none;
                color: #C0C0C0;
                font-size: 5vh;
                border: 1px solid black;
                z-index: 2;
            }

            .title_edit::placeholder {
                color: #808080;
            }

            .square{
                background-color: transparent;
                position: absolute;
                width:50%;
                height: 46.25%;
                z-index:1;
                display:flex;
                align-items:center;
                justify-content:center;
                flex-direction:column;
                border: 1px solid black;
            }
            .square1{
                left: 0%;
                top:7.5%;
            }
            .square2{
                left: 50%;
                top:7.5%;
            }
            .square3{
                left: 0%;
                top:53.75%;
            }
            .square4{
                left: 50%;
                top: 53.75%;
            }

            .art_page_img {
                width: 15vw;
                max-height: 30vh;
                object-fit: contain;
            }

            .back {
                position: absolute;
                left:0.5%;
                top:2%;
                min-width: 5%;
                min-height:5%;
                aspect-ratio:1/1;
                border-radius:50%;
                background-color: #400000;
                opacity: 50%;
                z-index:3;
            }
            .writing {
                width: 85%;
                height: 85%;
                border: none;
                box-shadow: none;
                background-color: transparent;
                z-index:2;
                resize: none;
            }
            .image_list {
                width: 50%;;
                height: 75%;
                border: 1px solid black;
                background-color: #808080;
                z-index: 4;
                overflow-y: scroll;
            }
            .image_list::-webkit-scrollbar {
                width: 0.5vw; /* must specify width for vertical scrollbar */
            }
            .image_list::-webkit-scrollbar-track {
                background: transparent; /* invisible track */
            }
            .image_list::-webkit-scrollbar-thumb{
                background:black;
            }
            .listitem {
                cursor: pointer;
                width: 100%;
                overflow-x: scroll;
                overflow-y: hidden;
                height: 25%;
                border-bottom: 0.5px solid black;
                border-top: 0.5px solid black;
                font-size: 3vh;
                display:flex;
                text-align:center;
                flex-direction:column;
                justify-content:center;
                padding:0;

                white-space: nowrap; /* prevents text wrap */
                text-overflow: ellipsis; /* optional: shows ... if text overflows */
            }
            .listitem::-webkit-scrollbar {
                width: 1vw; /* must specify width for vertical scrollbar */
            }
            .listitem::-webkit-scrollbar-track {
                background: transparent; /* invisible track */
            }
            .listitem::-webkit-scrollbar-thumb{
                background:transparent;
            }
            .save{
                position: absolute;
                height: 5%;
                transform-origin: center center;
                left: 50.2%;
                top: 54%;
                transform: translate(-50%, -50%);
                border-radius: 50%;
                aspect-ratio: 1/1;
                background-color: #C0C0C0;
                z-index: 5;
                cursor: pointer;
            }

            .search_page{
                background-color: #606060;
                position: absolute;
                width: 50%;
                left: 25%;
                top:10%;
                height:90%;
                border-radius:12.5%;
                overflow:hidden;
                display:flex;
                justify-content:center;
            }

            .page_titel{
                position: absolute;
                text-align:center;
                left:0;
                width: 100%;
                background-color: #707070;
                top: 0;
                height: 7.5%;
                box-shadow: none;
                border:none;
                color: #C0C0C0;
                font-size: 5vh;
                border: 1px solid black;
                z-index: 2;
            }

            .p_square{
                background-color: transparent;
                position: absolute;
                width:50%;
                height: 46.25%;
                z-index:1;
                display:flex;
                align-items:left;
                justify-content:center;
                flex-direction:column;
                border: 1px solid black;
                overflow-y: scroll;
                text-wrap: wrap;
            }
            .p_square::-webkit-scrollbar {
                width: 0.5vh; /* must specify width for vertical scrollbar */
            }
            .p_square::-webkit-scrollbar-track {
                background: transparent; /* invisible track */
            }
            .p_square::-webkit-scrollbar-thumb {
                background: black
            }
            .p_p{
                display: block;              /* prevent flex from messing text alignment */
                overflow-y: auto;            /* scroll down */
                overflow-x: hidden;          /* NEVER scroll horizontally */
                padding: 5px;                /* avoid text touching borders */

                text-align: left;
                white-space: normal;         /* allow wrapping */
                word-wrap: break-word;       /* force wrap inside long words */
            }

            .p_square1{
                left: 0%;
                top:7.5%;
            }
            .p_square2{
                left: 50%;
                top:7.5%;
            }
            .p_square3{
                left: 0%;
                top:53.75%;
            }
            .p_square4{
                left: 50%;
                top: 53.75%;
            }
            .p_img{
                min-width: 10%;
                max-width: 100%;
                max-height: 100%;
            }
        </style>
    </head>
    <body>
        <div class="search_page hidden">
            <div class="page_titel"></div>
            <div class="p_square1 p_square" id="p_sqr_1"></div>
            <div class="p_square2 p_square" id="p_sqr_2"></div>
            <div class="p_square3 p_square" id="p_sqr_3"></div>
            <div class="p_square4 p_square" id="p_sqr_4"></div>
        </div>
        <div class="image_page hidden">
            <div class="image_image_page">
            </div>

            <input type="file" id="imageUpload" accept="image/*" hidden>
            <label for="imageUpload" style="position:absolute;left:10%;top:5%;">
                <div id="img_upload_thing" style="background-color:#808080;width:200%;height:10%;border-radius:50%;text-align:center;" alt="Upload image" class="art_page_img">+</div>
            </label>
        </div>
        <div class="profile_settings_page hidden">
            <div class="profile_top_space">
                <div class="profileicon"></div>
                <p class="profile_title">abc</p>
            </div>
            <div class="profile_moderator_space">
                <input type="checkbox" id="cbx1" class="cbx_class" style="display: none;">
                <label for="cbx1" class="check" id="cbx1a" style="left: 0%; top: 10%;margin:0;">
                    <svg width="1.5vw" height="1.5vw" viewBox="0 0 18 18">
                        <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                        <polyline points="1 9 7 14 15 4"></polyline>
                    </svg>
                </label>
                <p class="cbx_txt" id="cbx1_txt">apply to be moderator</p>
            </div>
            <div class="profile_private_space">
                <input type="checkbox" id="cbx2" class="cbx_class" style="display: none;">
                <label for="cbx2" class="check" style="left: 0%; top: 10%;margin:0;">
                    <svg width="1.5vw" height="1.5vw" viewBox="0 0 18 18">
                        <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                        <polyline points="1 9 7 14 15 4"></polyline>
                    </svg>
                </label>
                <p class="cbx_txt" id="cbx2_txt">private profile</p>
            </div>
            <div class="profile_pfp_space">
                <p class="cbx_txt">Profile picture: </p>
                <p class="cbx_txt" id="pfp_txt" style="cursor:pointer;">Je hebt geen profiel foto!</p>
            </div>
            <div class="profile_paginas_space">
                <p class="cbx_txt">Paginas: </p>
                <p class="cbx_txt" id="paginas_txt" style="">Je hebt nog geen paginas gemaakt!</p>
            </div>
            <div class="profile_afbeeldingen_space">
                <p class="cbx_txt">Afbeeldingen: </p>
                <p class="cbx_txt" id="afbeeldingen_txt" style="">Je hebt nog geen afbeeldignen geupload!</p>
            </div>
        </div>
        <div class="navbar">
            <button class="accounticon" onclick="profile_settings()"></button>

            <button class="new_btn" id="new" style="left: 5%;">
                <p style="position:absolute;top:7.5%;left:0;width:100%;height:100%;">new</p>
            </button>
            <button class="new_btn" style="left: 10%;" onclick="imagepage();">
                <p style="position:absolute;top:7.5%;left:0;width:100%;height:100%;">img</p>
            </button>
            <button class="new_btn" style="left: 15%;" onclick="randompage();">
                <p style="position:absolute;top:7.5%;left:0;width:100%;height:100%;">random</p>
            </button>
            <input placeholder="Search for articles" class="searchbar" name="text" type="text">
            <button class="chat_btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -0.5 14 15" shape-rendering="crispEdges" style="position:absolute;width:80%;top:10%;left:10%;">
                    <path stroke="#000000" d="M2 0h10M1 1h1M12 1h1M0 2h1M13 2h1M0 3h1M13 3h1M0 4h1M13 4h1M0 5h1M4 5h1M7 5h1M10 5h1M13 5h1M0 6h1M3 6h1M6 6h1M9 6h1M13 6h1M0 7h1M13 7h1M0 8h1M13 8h1M1 9h1M12 9h1M2 10h5M9 10h3M6 11h1M9 11h1M6 12h1M8 12h1M6 13h2M6 14h1" />
                    <path stroke="#ffffff" d="M2 1h10M1 2h12M1 3h12M1 4h12M1 5h3M5 5h2M8 5h2M11 5h2M1 6h2M4 6h2M7 6h2M10 6h3M1 7h12M1 8h12M2 9h10M7 10h2M7 11h2M7 12h1" />
                </svg>
            </button>
        </div>
        <div class="profile_settings hidden">
            <div class="profile_settings_item" id="ps1"><p><u>username:</u><br>guest1</p></div>
            <div class="profile_settings_item" id="ps2">a</div>
            <div class="profile_settings_item" id="ps3" style="cursor:pointer;"><p>profile settings</p></div>
            <a href="http://localhost/sign_in_phpVeind.php" id="ps4" style="text-decoration: none;color:inherit;"><div class="profile_settings_item" style="cursor:pointer;"><p>log out</p></div></a>
        </div>
        <div class="new_page hidden">
            <input placeholder="Titel..." class="title_edit" type="text">
            <div class="square square1">
                <div class="back hidden" id="back_1" style="cursor:pointer;" onclick="back(1)"></div>
                <button id="button_1" style="width:50%;height:25%;margin:5%;background-color:#C0C0C0;cursor:pointer;font-size:3vh;" onclick="textsquare(1)">text</button>
                <button style="width:50%;height:25%;margin:5%;background-color:#C0C0C0;cursor:pointer;font-size:3vh;" onclick="imgsquare(1)">image</button>
                <textarea type="text" id="textarea_1" class="writing hidden" placeholder="Hiii"></textarea>
                <div class="image_list hidden" id="list_1"></div>
            </div>
            <div class="square square2">
                <div class="back hidden" id="back_2" style="cursor:pointer;" onclick="back(2)"></div>
                <button id="button_2" style="width:50%;height:25%;margin:5%;background-color:#C0C0C0;cursor:pointer;font-size:3vh;" onclick="textsquare(2)">text</button>
                <button style="width:50%;height:25%;margin:5%;background-color:#C0C0C0;cursor:pointer;font-size:3vh;" onclick="imgsquare(2)">image</button>
                <textarea type="text" id="textarea_2" class="writing hidden" placeholder="Hiii"></textarea>
                <div class="image_list hidden" id="list_2"></div>
            </div>
            <div class="square square3">
                <div class="back hidden" id="back_3" style="cursor:pointer;" onclick="back(3)"></div>
                <button id="button_3" style="width:50%;height:25%;margin:5%;background-color:#C0C0C0;cursor:pointer;font-size:3vh;" onclick="textsquare(3)">text</button>
                <button style="width:50%;height:25%;margin:5%;background-color:#C0C0C0;cursor:pointer;font-size:3vh;" onclick="imgsquare(3)">image</button>
                <textarea type="text" id="textarea_3" class="writing hidden" placeholder="Hiii"></textarea>
                <div class="image_list hidden" id="list_3"></div>
            </div>
            <div class="square square4">
                <div class="back hidden" id="back_4" style="cursor:pointer;" onclick="back(4)"></div>
                <button id="button_4" style="width:50%;height:25%;margin:5%;background-color:#C0C0C0;cursor:pointer;font-size:3vh;" onclick="textsquare(4)">text</button>
                <button style="width:50%;height:25%;margin:5%;background-color:#C0C0C0;cursor:pointer;font-size:3vh;" onclick="imgsquare(4)">image</button>
                <textarea type="text" id="textarea_4" class="writing hidden" placeholder="Hiii"></textarea>
                <div class="image_list hidden" id="list_4"></div>
            </div>
            <div class="save" onclick="save()"></div>
        </div>

        <?php
            $temp_user = isset($_POST['temp_user']) ? $_POST['temp_user'] : 'guest';
        ?>
        <?php
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $db = 'po_webapp';

            // Verbind met database
            $conn = new mysqli($host, $user, $pass, $db);

            if ($conn->connect_error) {
                die("Databasefout: " . $conn->connect_error);
            }

            //Accounts:
            $accountrawdata = "SELECT * FROM account";
            $accountdata = $conn->query($accountrawdata);
            
            $accounts = [];
            if ($accountdata && $accountdata->num_rows > 0) {
                while ($row = $accountdata->fetch_assoc()) {
                    $accounts[] = [
                        'naam' => htmlspecialchars($row['naam']),
                        'wachtwoord' => htmlspecialchars($row['wachtwoord']),
                        'pfp' => htmlspecialchars($row['pfp']),
                        'moderator' => $row['moderator'],
                        'moderator_application' => htmlspecialchars($row['moderator_application']),
                        'private' => $row['private']
                    ];
                }
            } else {
                echo "Geen resultaten gevonden.";
            }

            // Voor eventueel gebruik in JS
            $accountdata->data_seek(0); // reset pointer
            $rows = $accountdata->fetch_all(MYSQLI_ASSOC);


            //paginas:
            $paginasrawdata = "SELECT * FROM pagina";
            $paginadata = $conn->query($paginasrawdata);
            

            $paginas = [];
            if ($paginadata && $paginadata->num_rows > 0) {
                while ($row = $paginadata->fetch_assoc()) {
                    $paginas[] = [
                        'titel' => htmlspecialchars($row['titelpagina']),
                        'square1_type' => htmlspecialchars($row['square1_type']),
                        'square2_type' => htmlspecialchars($row['square2_type']),
                        'square3_type' => htmlspecialchars($row['square3_type']),
                        'square4_type' => htmlspecialchars($row['square4_type']),
                        'square1_inhoud' => htmlspecialchars($row['square1_inhoud']),
                        'square2_inhoud' => htmlspecialchars($row['square2_inhoud']),
                        'square3_inhoud' => htmlspecialchars($row['square3_inhoud']),
                        'square4_inhoud' => htmlspecialchars($row['square4_inhoud']),
                        'eigenaar' => htmlspecialchars($row['eigenaar'])
                    ];
                }
            } else {
                echo "Geen resultaten gevonden.";
            }

            // Voor eventueel gebruik in JS
            $paginadata->data_seek(0); // reset pointer
            $rows = $paginadata->fetch_all(MYSQLI_ASSOC);


            //afbeeldingen:
            $imagesrawdata = "SELECT * FROM afbeeldingen";
            $imagesdata = $conn->query($imagesrawdata);
            
            $images = [];
            if ($imagesdata && $imagesdata->num_rows > 0) {
                while ($row = $imagesdata->fetch_assoc()) {
                    $images[] = [
                        'titel' => htmlspecialchars($row['titel']),
                        'data' => htmlspecialchars($row['data']),
                        'eigenaar' => htmlspecialchars($row['eigenaar'])
                    ];
                }
            } else {
                echo "Geen resultaten gevonden.";
            }

            $imagesdata->data_seek(0); //reset de pointer
            $rows = $imagesdata->fetch_all(MYSQLI_ASSOC);


            //folders:
            $foldersrawdata = "SELECT * FROM folders";
            $folderdata = $conn->query($foldersrawdata);
            
            $folders = [];
            if ($folderdata && $folderdata->num_rows > 0) {
                while ($row = $folderdata->fetch_assoc()) {
                    $folders[] = [
                        'paginas' => htmlspecialchars($row['paginas']),
                        'titel' => htmlspecialchars($row['titel']),
                        'eigenaar' => htmlspecialchars($row['eigenaar'])
                    ];
                }
            } else {
                echo "Geen resultaten gevonden.";
            }

            // Voor eventueel gebruik in JS
            $folderdata->data_seek(0); // reset pointer
            $rows = $folderdata->fetch_all(MYSQLI_ASSOC);
        ?>
        
        <script>
            let profile_picture = "shrimp";
            let password = '';
            let moderator = false;
            let moderator_application = false;
            let private = true;
            let owned_paginas = [];
            let owned_folders = [];

            let username = 'sophie';
            let userID = 0;

            let all_images_src = [];
            let all_images_name = [];
            let all_images_owner = [];
            let owned_images_src = [];
            let owned_images_name = [];

            //replace all the variables with their php counterparts
            let accounts = <?php echo json_encode($accounts); ?>;
            let paginas = <?php echo json_encode($paginas); ?>;
            let folders = <?php echo json_encode($folders); ?>;
            let images = <?php echo json_encode($images); ?>;

            let user = <?php echo isset($temp_user) ? json_encode($temp_user) : 'null'; ?>;
            <?php $temp_user = '';?>
            if(user == null){
                username = 'guest';
                userID = 0;
            }
            else{
                username = user;
                let index = -1;
                for (let i = 0; i < accounts.length; i++) {
                    if(accounts[i].naam == user){
                        index = i; 
                        break;
                    }
                }
                userID = index;
            }
            profile_picture = accounts[userID].pfp;
            password = accounts[userID].wachtwoord;
            if(accounts[userID].moderator == 1){moderator = true;}else{moderator = false;}
            if(accounts[userID].moderator_application == 1){moderator_application = true;}else{moderator_application = false;};
            if(accounts[userID].private == 1){private = true;}else{private = false;}
            //owned_paginas:
            for(let x = 0; x < paginas.length; x++){
                if(paginas[x].eigenaar == username){
                    owned_paginas.push(paginas[x].titel);
                }
            }
            //owned_folders:
            for(let x = 0; x < folders.length; x++){
                if(folders[x].eigenaar == username){
                    owned_folders.push(folders[x].titel);
                }
            }
            //owned_images_src en owned_images_name:
            for(let x = 0; x < images.length; x++){
                if(images[x].eigenaar == username){
                    owned_images_name.push(images[x].titel);
                    owned_images_src.push(images[x].data)
                }
            }
            //all_images_src en all_images_name:
            for(let x = 0; x < images.length; x++){
                all_images_name.push(images[x].titel);
                all_images_src.push(images[x].data);
                all_images_owner.push(images[x].owner);
            }
        </script>

        <script>
            let img_page = document.querySelector(".image_image_page");
            for(let x = 0; x<all_images_src.length; x++){
                let img = document.createElement('img');
                let txt = document.createElement('p');
                img.src = all_images_src[x];
                img.id = all_images_name[x];
                img.classList.add("img_page_img");
                txt.textContent = img.id;
                txt.id = `text_${all_images_name.indexOf(img.id)}`;
                txt.classList.add("hidden");
                txt.style.position = "absolute";
                txt.style.textShadow = "2px 0 #ffffff, -2px 0 #ffffff, 0 2px #ffffff, 0 -2px #ffffff, 1px 1px #ffffff, -1px -1px #ffffff, 1px -1px #ffffff, -1px 1px #ffffff";
                img.addEventListener("mousemove", (e)=>{
                    document.getElementById(`text_${all_images_name.indexOf(img.id)}`).style.top = e.pageY + "px";
                    document.getElementById(`text_${all_images_name.indexOf(img.id)}`).style.left = e.pageX + "px";
                    document.getElementById(`text_${all_images_name.indexOf(img.id)}`).classList.remove("hidden");
                    setTimeout(() => {
                        txt.classList.add("hidden");
                    }, 10000);
                });
                img.addEventListener("mouseout", ()=>{
                    document.getElementById(`text_${all_images_name.indexOf(img.id)}`).classList.add("hidden");
                });
                img_page.appendChild(img);
                document.body.appendChild(txt);

                if(owned_images_name.includes(img.id) || moderator){
                    img.addEventListener("click", () => {
                        let artNR = all_images_name.indexOf(img.id);
                        let artNR2 = owned_images_name.indexOf(img.id);
                        all_images_name.splice(artNR, 1); //splice to delete the image from this list for renaming (it will get added back later)
                        owned_images_name.splice(artNR2, 1);
                        let newname = prompt('insert name for image', name);
                        if(newname == null || newname == ""){
                            name = name;
                        }
                        else{
                            name = newname;
                        }
                        let y = 1;
                        while(all_images_name.includes(name)){
                            y += 1;
                            if(!all_images_name.includes(name + '_' + y)){
                                name = name + '_' + y;
                            }
                        }
                        all_images_name.splice(artNR, 0, name); //splice, to add image back in the previous location
                        owned_images_name.splice(artNR, 0, name);
                        IMGnameupdate(img.id, name);
                        img.id = name;
                        document.getElementById(`text_${all_images_name.indexOf(name)}`).textContent = name;
                    });
                    img.addEventListener("contextmenu", e => {
                        let artNR = all_images_name.indexOf(name);
                        let artNR2 = owned_images_name.indexOf(name);

                        e.preventDefault();
                        let yesorno = prompt("Type 'YES' to delete");
                        if(yesorno == "YES"){
                            //IMGdeleter(all_images_name[artNR]);
                            console.log(img.id);
                            IMGdeleter(img.id);
                            all_images_name.splice(artNR, 1);
                            owned_images_name.splice(artNR, 1);
                            all_images_src.splice(artNR, 1);
                            owned_images_src.splice(artNR, 1);
                            img.remove();
                        }
                    });
                }
            }
            document.querySelector(".profile_settings_page").addEventListener("click", ()=>{
                document.querySelector(".profile_settings").classList.add("hidden");
            });
            document.querySelector(".searchbar").addEventListener("keydown", (e) => {
                if (e.key == "Enter") {
                    console.log("Enter pressed while input is focused!");
                    if(paginas.some(p => p.titel == document.querySelector(".searchbar").value)){
                        let index = paginas.findIndex(p => p.titel == document.querySelector(".searchbar").value);
                        console.log("found page titled: " + paginas[index].titel);
                        console.log("on position: " + index);

                        openpagina(index);
                    }
                }
            });

            function randompage(){
                let randomnummer = Math.floor(Math.random() * paginas.length);
                openpagina(randomnummer);
            }

            document.getElementById("ps3").addEventListener("click", ()=>{
                document.querySelector(".image_page").classList.add("hidden");
                document.querySelector(".new_page").classList.add("hidden");
                document.querySelector(".search_page").classList.add("hidden");
                document.querySelector(".profile_settings_page").classList.toggle("hidden");
                document.querySelector(".profile_title").textContent = username;
                document.getElementById("pfp_txt").textContent = profile_picture;
                document.getElementById("pfp_txt").style.color = "#C0C0C0";
                document.getElementById("cbx1_txt").textContent = "apply to be moderator";
                document.getElementById("cbx1").checked = moderator_application;
                if(moderator){
                    document.getElementById("cbx1a").classList.add("hidden");
                    document.getElementById("cbx1_txt").innerHTML = "<u>moderator</u>";
                    document.getElementById("cbx1_txt").style.color = "#808000";
                    document.getElementById("cbx1_txt").style.cursor = "default";
                    document.getElementById("cbx1_txt").addEventListener("mouseover", ()=>{
                        document.getElementById("cbx1_txt").style.color = "#A0A000";
                    });
                    document.getElementById("cbx1_txt").addEventListener("mouseout", ()=>{
                        document.getElementById("cbx1_txt").style.color = "#808000";
                    });
                }
                else if(moderator_application){
                    document.getElementById("cbx1_txt").style.color = "#C0C0C0";
                }
                document.getElementById("cbx2").checked = private;
                if(private){
                    document.getElementById("cbx2_txt").style.color = "#C0C0C0";
                }
                document.getElementById("paginas_txt").textContent = owned_paginas;
                document.getElementById("folders_txt").textContent = owned_folders;
                document.getElementById("afbeeldingen_txt").textContent = owned_images_name;
            });

            if (document.getElementById("ps1").textContent.length > 26) {
                document.getElementById("ps1").innerHTML = document.getElementById("ps1").innerHTML.slice(0, 37) + "...";
            }
            if(username == 'guest'){
                document.getElementById("ps1").innerHTML = "<p><u>username:</u><br>guest</p>";
                document.getElementById("ps2").innerHTML = "<p><u>status:</u><br>guest</p>";
            }
            else{
                document.getElementById("ps1").innerHTML = `<p><u>username:</u><br>${username}</p>`;
                if(moderator){
                    document.getElementById("ps2").innerHTML = `<p><u>status:</u><br>moderator</p>`;
                }
                else if(moderator_application){
                    document.getElementById("ps2").innerHTML = `<p><u>status:</u><br>applied to be moderator</p>`;
                }
                else{
                    document.getElementById("ps2").innerHTML = `<p><u>status:</u><br>user</p>`;
                }
            }
            setmainpfp(profile_picture);
            let pfps = ["sun", "shiny axe", "goblin", "rusty axe", "shrimp", "sausage"];
            let randompfp = pfps.indexOf(profile_picture) + 1;
            document.getElementById("pfp_txt").addEventListener("click", ()=>{
                if(!(username == "guest")){
                    if(randompfp == pfps.length){randompfp = 0;}
                    removemainpfp();
                    setmainpfp(pfps[randompfp]);
                    profile_picture = pfps[randompfp];
                    randompfp += 1;
                    document.getElementById("pfp_txt").textContent = profile_picture;

                    updatePHP(profile_picture, private, moderator_application);
                }
            });

            function profile_settings(){
                document.querySelector(".profile_settings").classList.toggle("hidden");
            }

            function imagepage(){
                document.querySelector(".profile_settings_page").classList.add("hidden");
                document.querySelector(".search_page").classList.add("hidden");
                document.querySelector(".new_page").classList.add("hidden");
                document.querySelector(".image_page").classList.toggle("hidden");
            }

            document.getElementById("new").addEventListener("click", ()=>{
                new_page();
            })
            function new_page(){
                document.querySelector(".profile_settings_page").classList.add("hidden");
                document.querySelector(".search_page").classList.add("hidden");
                document.querySelector(".image_page").classList.add("hidden");
                document.querySelector(".new_page").classList.toggle("hidden");
            }

            function openpagina(Nummer){
                //Paginas weer leeg maken:
                document.querySelectorAll(".p_square > *").forEach(item => {
                    item.remove();
                });
                document.getElementById("p_sqr_1").textContent = "";
                document.getElementById("p_sqr_2").textContent = "";
                document.getElementById("p_sqr_3").textContent = "";
                document.getElementById("p_sqr_4").textContent = "";

                document.querySelector(".profile_settings_page").classList.add("hidden");
                document.querySelector(".image_page").classList.add("hidden");
                document.querySelector(".new_page").classList.add("hidden");
                document.querySelector(".search_page").classList.remove("hidden");
                document.querySelector(".page_titel").textContent = paginas[Nummer].titel;
                if(paginas[Nummer].square1_type == "text"){
                    let text = document.createElement('p');
                    text.textContent = paginas[Nummer].square1_inhoud;
                    text.classList.add("p_p");
                    document.getElementById("p_sqr_1").appendChild(text);
                }
                else if(paginas[Nummer].square1_type == "image"){
                    let img = document.createElement('img');
                    console.log(all_images_src[all_images_name.indexOf(paginas[Nummer].square1_inhoud)]);
                    img.src = all_images_src[all_images_name.indexOf(paginas[Nummer].square1_inhoud)];
                    img.classList.add("p_img");
                    document.getElementById("p_sqr_1").appendChild(img);
                }
                if(paginas[Nummer].square2_type == "text"){
                    let text = document.createElement('p');
                    text.textContent = paginas[Nummer].square2_inhoud;
                    text.classList.add("p_p");
                    document.getElementById("p_sqr_2").appendChild(text);
                }
                else if(paginas[Nummer].square2_type == "image"){
                    let img = document.createElement('img');
                    img.src = all_images_src[all_images_name.indexOf(paginas[Nummer].square2_inhoud)];
                    img.classList.add("p_img");
                    document.getElementById("p_sqr_2").appendChild(img);
                }
                if(paginas[Nummer].square3_type == "text"){
                    let text = document.createElement('p');
                    text.textContent = paginas[Nummer].square3_inhoud;
                    text.classList.add("p_p");
                    document.getElementById("p_sqr_3").appendChild(text);
                }
                else if(paginas[Nummer].square3_type == "image"){
                    let img = document.createElement('img');
                    img.src = all_images_src[all_images_name.indexOf(paginas[Nummer].square3_inhoud)];
                    img.classList.add("p_img");
                    document.getElementById("p_sqr_3").appendChild(img);
                }
                if(paginas[Nummer].square4_type == "text"){
                    let text = document.createElement('p');
                    text.textContent = paginas[Nummer].square4_inhoud;
                    text.classList.add("p_p");
                    document.getElementById("p_sqr_4").appendChild(text);
                }
                else if(paginas[Nummer].square4_type == "image"){
                    let img = document.createElement('img');
                    img.src = all_images_src[all_images_name.indexOf(paginas[Nummer].square4_inhoud)];
                    img.classList.add("p_img");
                    document.getElementById("p_sqr_4").appendChild(img);
                }
            }

            function setmainpfp(pfp){
                let container1 = document.querySelector(".accounticon");
                let container2 = document.querySelector(".profileicon");
                let namespace = "http://www.w3.org/2000/svg";
                let svg = document.createElementNS(namespace, "svg");
                let path = document.createElementNS(namespace, "path");
                let colors = [];
                let paths = [];
                
                if(pfp == "goblin"){
                    svg.setAttribute("viewBox", "0 -0.5 8 8");
                    colors = [
                        "#000000",
                        "#8b5213",
                        "#bd0f0f",
                        "#0e900e",
                        "818181"
                    ];
                    paths = [
                        "M3 0h4M2 1h4M5 2h1M5 3h2M1 4h2M4 4h2M2 5h1M4 5h2M2 6h4M2 7h1M5 7h1",
                        "M0 1h1M0 2h1",
                        "M2 2h1M4 2h1",
                        "M3 2h1M0 3h1M2 3h3M7 4h1",
                        "M3 4h1M3 5h1"
                    ];
                }
                else if(pfp == "rusty axe"){
                    svg.setAttribute("viewBox", "0 -0.5 30 32");
                    colors = [
                        "#46200e",
                        "#46310e",
                        "#000000",
                        "#424242",
                        "#4d350f",
                        "#696969",
                        "#5a5a5a",
                        "#303030",
                        "#6e6359"
                    ];
                    paths = [
                        "M14 0h2M13 1h2M12 2h2",
                        "M15 1h2M14 2h4M13 3h4M14 4h2M14 5h2M14 6h1M15 9h1M14 10h2M15 11h1M15 12h1M14 13h1M14 16h1M14 17h1M15 18h1M14 20h1M14 21h2M14 22h1M13 31h1M15 31h1",
                        "M6 2h3M21 2h3M5 3h1M9 3h2M19 3h2M24 3h1M3 4h1M11 4h1M18 4h1M26 4h1M12 5h1M17 5h1M2 6h1M9 6h4M17 6h4M27 6h1M8 7h1M21 7h1M1 8h1M8 8h1M21 8h1M28 8h1M1 9h1M9 9h1M12 9h2M16 9h2M20 9h1M28 9h1M10 10h2M18 10h2M0 11h1M29 11h1M0 12h1M29 12h1M0 13h1M10 13h2M18 13h2M29 13h1M1 14h1M9 14h1M12 14h2M16 14h2M20 14h1M28 14h1M1 15h1M8 15h1M21 15h1M28 15h1M8 16h1M21 16h1M2 17h1M9 17h4M17 17h4M27 17h1M2 18h1M12 18h1M17 18h1M27 18h1M3 19h1M11 19h1M18 19h1M26 19h1M4 20h1M9 20h2M19 20h2M25 20h1M6 21h3M21 21h3",
                        "M4 3h1M25 3h1M4 4h1M25 4h1M2 5h1M4 5h1M25 5h1M27 5h1M3 6h1M5 6h1M24 6h1M26 6h1M1 7h3M26 7h3M3 8h2M25 8h2M4 9h1M25 9h1M0 10h2M28 10h2M2 11h1M27 11h1M3 14h1M26 14h1M3 15h1M26 15h1M1 16h2M27 16h2M6 17h1M23 17h1M5 18h1M24 18h1M5 19h2M23 19h2M5 20h1M24 20h1",
                        "M6 3h3M21 3h3M5 4h1M8 4h1M23 4h2M3 5h1M7 5h1M24 5h1M26 5h1M4 6h1M4 7h2M27 8h1M27 9h1M8 10h2M9 11h4M1 12h2M11 12h1M16 12h1M18 12h1M1 13h3M16 13h2M28 13h1M2 14h1M27 14h1M27 15h1M26 17h1M3 18h2M26 18h1M4 19h1M25 19h1M7 20h2",
                        "M6 4h2M9 4h2M19 4h4M5 5h2M8 5h1M21 5h3M6 6h2M22 6h2M25 6h1M6 7h1M23 7h3M2 8h1M5 8h2M23 8h2M2 9h2M5 9h1M24 9h1M26 9h1M2 10h4M7 10h1M22 10h1M24 10h4M1 11h1M3 11h3M7 11h2M21 11h2M24 11h3M28 11h1M3 12h3M7 12h2M21 12h2M24 12h5M4 13h2M7 13h1M22 13h1M24 13h4M4 14h2M24 14h2M2 15h1M4 15h3M23 15h3M3 16h4M23 16h4M3 17h3M7 17h1M22 17h1M24 17h2M6 18h3M21 18h3M25 18h1M7 19h4M19 19h4M6 20h1M21 20h3",
                        "M9 5h3M18 5h3M8 6h1M21 6h1M7 7h1M22 7h1M7 8h1M22 8h1M6 9h3M21 9h3M6 10h1M12 10h2M16 10h2M20 10h2M23 10h1M6 11h1M13 11h1M16 11h5M23 11h1M6 12h1M9 12h2M12 12h2M17 12h1M19 12h2M23 12h1M6 13h1M8 13h2M12 13h2M20 13h2M23 13h1M6 14h3M21 14h3M7 15h1M22 15h1M7 16h1M22 16h1M8 17h1M21 17h1M9 18h3M18 18h3",
                        "M15 6h1M14 7h2M14 8h2M14 9h1M14 11h1M14 12h1M15 13h1M14 14h2M14 15h2M15 16h1M15 17h1M14 18h1M14 19h2M15 20h1M15 22h1M14 23h2M15 25h1M14 26h1M14 27h1M15 29h1M14 31h1M16 31h1",
                        "M14 24h2M14 25h1M15 26h1M15 27h1M14 28h2M14 29h1M14 30h2"
                    ];
                }
                else if(pfp == "shiny axe"){
                    svg.setAttribute("viewBox", "0 -0.5 30 32");
                    colors = [
                        "#303030",
                        "#3d3d3d",
                        "#000000",
                        "#888888",
                        "#696969",
                        "#5a5a5a",
                        "#555252",
                        "#9c661a",
                        "#ae7629",
                        "#855612",
                        "#885c16"
                    ];
                    paths = [
                        "M14 0h1M13 1h3M12 2h5M13 3h3M14 4h1M14 5h1M14 6h1M14 7h1M14 8h1M14 9h1M14 10h1M14 11h1M14 12h1M14 13h1M14 14h1M14 15h1M14 16h1M14 17h1M14 18h1M14 19h1M14 20h1M14 21h1M14 22h1M14 23h1M13 31h2",
                        "M15 0h1M16 1h1M17 2h1M16 3h1M15 4h1M15 5h1M15 6h1M15 7h1M15 8h1M15 9h1M15 10h1M15 11h1M15 12h1M15 13h1M15 14h1M15 15h1M15 16h1M15 17h1M15 18h1M15 19h1M15 20h1M15 21h1M15 22h1M15 23h1M15 31h2",
                        "M6 2h3M21 2h3M4 3h2M9 3h2M19 3h2M24 3h2M3 4h1M11 4h1M18 4h1M26 4h1M2 5h1M12 5h1M17 5h1M27 5h1M2 6h1M9 6h4M17 6h4M27 6h1M1 7h1M8 7h1M21 7h1M28 7h1M1 8h1M8 8h1M21 8h1M28 8h1M1 9h1M9 9h1M12 9h2M16 9h2M20 9h1M28 9h1M0 10h1M10 10h2M18 10h2M29 10h1M0 11h1M29 11h1M0 12h1M29 12h1M0 13h1M10 13h2M18 13h2M29 13h1M1 14h1M9 14h1M12 14h2M16 14h2M20 14h1M28 14h1M1 15h1M8 15h1M21 15h1M28 15h1M1 16h1M8 16h1M21 16h1M28 16h1M2 17h1M9 17h4M17 17h4M27 17h1M2 18h1M12 18h1M17 18h1M27 18h1M3 19h1M11 19h1M18 19h1M26 19h1M4 20h2M9 20h2M19 20h2M24 20h2M6 21h3M21 21h3",
                        "M6 3h3M21 3h3M4 4h3M19 4h4M3 5h3M18 5h3M3 6h2M2 7h2M2 8h1M2 9h1",
                        "M7 4h4M23 4h3M6 5h3M21 5h6M5 6h3M22 6h5M4 7h3M23 7h5M3 8h4M23 8h5M3 9h3M24 9h4M1 10h5M7 10h1M22 10h1M24 10h4M1 11h5M7 11h2M21 11h2M24 11h4M1 12h5M7 12h2M21 12h2M24 12h4M1 13h5M7 13h1M22 13h1M24 13h4M2 14h4M24 14h3M2 15h5M23 15h4M2 16h5M23 16h3M3 17h5M22 17h3M3 18h4M21 18h3M4 19h2M19 19h4",
                        "M9 5h3M8 6h1M21 6h1M7 7h1M22 7h1M7 8h1M22 8h1M6 9h3M21 9h3M6 10h1M8 10h2M12 10h2M16 10h2M20 10h2M23 10h1M6 11h1M9 11h5M16 11h5M23 11h1M6 12h1M9 12h5M16 12h5M23 12h1M6 13h1M8 13h2M12 13h2M16 13h2M20 13h2M23 13h1M6 14h3M21 14h3M7 15h1M22 15h1M7 16h1M22 16h1M21 17h1M18 18h3",
                        "M28 10h1M28 11h1M28 12h1M28 13h1M27 14h1M27 15h1M26 16h2M8 17h1M25 17h2M7 18h5M24 18h3M6 19h5M23 19h3M6 20h3M21 20h3",
                        "M14 24h1M14 26h1M14 28h1M14 30h1",
                        "M15 24h1M15 26h1M15 28h1M15 30h1",
                        "M14 25h1M14 27h1M14 29h1",
                        "M15 25h1M15 27h1M15 29h1"
                    ];
                }
                else if(pfp == "sun"){
                    svg.setAttribute("viewBox", "0 -0.5 29 29");
                    colors = [
                        "#ff8000",
                        "#ffff00"
                    ];
                    paths = [
                        "M14 0h1M14 1h1M13 2h2M13 3h3M24 3h1M3 4h4M14 4h2M24 4h1M5 5h3M11 5h1M14 5h2M23 5h2M6 6h2M11 6h2M18 6h1M20 6h5M6 7h4M12 7h1M17 7h1M20 7h4M6 8h3M17 8h1M19 8h3M8 9h1M21 9h1M6 10h1M13 10h3M7 11h2M11 11h7M22 11h2M11 12h7M21 12h2M3 13h3M10 13h9M25 13h2M0 14h6M10 14h9M23 14h6M2 15h2M10 15h9M23 15h3M6 16h2M11 16h7M5 17h2M11 17h7M20 17h2M13 18h3M22 18h1M7 19h1M20 19h1M7 20h3M11 20h1M20 20h3M5 21h4M11 21h1M16 21h1M19 21h4M4 22h5M10 22h1M16 22h2M21 22h2M4 23h2M13 23h2M17 23h1M21 23h3M4 24h1M13 24h2M22 24h4M4 25h1M13 25h3M14 26h2M14 27h1M14 28h1",
                        "M14 6h2M9 8h2M9 9h1M13 9h3M19 9h2M11 10h2M16 10h2M20 10h1M10 11h1M18 11h1M10 12h1M18 12h1M6 13h1M9 13h1M19 13h1M6 14h1M9 14h1M19 14h1M22 14h1M9 15h1M19 15h1M22 15h1M10 16h1M18 16h1M10 17h1M18 17h1M8 18h1M11 18h2M16 18h2M8 19h2M13 19h3M19 19h1M18 20h2M13 22h2"
                    ];
                }
                else if(pfp == "shrimp"){
                    svg.setAttribute("viewBox", "0 -0.5 8 8");
                    colors = [
                        "#d54700",
                        "#ff8000",
                        "#000000"
                    ];
                    paths = [
                        "M1 0h6M7 1h1M1 3h1M1 4h3M0 5h1M2 6h2M5 6h1M1 7h1M4 7h1",
                        "M1 2h4M6 2h2M0 3h1M2 3h4M0 4h1M7 4h1M1 5h3M6 5h2M0 6h2M4 6h1M6 6h1M2 7h2M5 7h1",
                        "M5 2h1"
                    ];
                }
                else if(pfp == "sausage"){
                    svg.setAttribute("viewBox", "0 -0.5 9 8");
                    colors = [
                        "#ad3e1f",
                        "#ee5c32",
                        "#ff7a8b",
                        "#ffffff"
                    ];
                    paths = [
                        "M3 0h1M2 1h2M2 2h2M2 3h2M2 4h1",
                        "M4 0h2M4 1h3M4 2h3M4 3h3M6 4h1",
                        "M3 4h2M2 5h1M4 5h3M2 6h3M6 6h1M3 7h1M5 7h1",
                        "M5 4h1M3 5h1M5 6h1M4 7h1"
                    ];
                }

                for(let x = 0; x<paths.length; x++){
                    path.setAttribute("stroke", colors[x]);
                    path.setAttribute("d", paths[x]);
                    svg.appendChild(path);
                    path = document.createElementNS(namespace, "path");
                }

                container1.appendChild(svg);
                container2.appendChild(svg.cloneNode(true));
            }

            function removemainpfp(){
                document.querySelectorAll(".accounticon > *").forEach(item => {
                    item.remove();
                });
                document.querySelectorAll(".profileicon > *").forEach(item => {
                    item.remove();
                });
            }

            let checkboxes = document.querySelectorAll(".cbx_class");
            checkboxes.forEach(box => {
                box.addEventListener("change", () => {
                    if (box.checked) {
                        checked(box.id);
                    } else {
                        unchecked(box.id);
                    }
                    updatePHP(profile_picture, private, moderator_application);
                });
            });

            function checked(EyeD){
                if(EyeD == "cbx2"){
                    private = true;
                    document.getElementById("cbx2_txt").style.color = "#C0C0C0";
                }
                else if(EyeD == "cbx1"){
                    moderator_application = true;
                    document.getElementById("cbx1_txt").style.color = "#C0C0C0";
                }
            }
            function unchecked(EyeD){
                if(EyeD == "cbx2"){
                    private = false;
                    document.getElementById("cbx2_txt").style.color = "#000000";
                }
                else if(EyeD == "cbx1"){
                    moderator_application = false;
                    document.getElementById("cbx1_txt").style.color = "#000000";
                }
            }

            //update de profielfoto, of ie prive is, en of hij een moderator applicatie heeft gesruut
            function updatePHP(newValue, private_bool, mod_app_bool) {
                //stuur nieuwe pfp en settings naar PHP
                fetch("updater.php", {
                    method: "POST",
                    //headers zeggen dat we JSON sturen
                    headers: {
                        "Content-Type": "application/json"
                    },
                    //body van request: zet alles om naar JSON
                    body: JSON.stringify({
                        pfp: newValue,
                        private: private_bool,
                        moderator_application: mod_app_bool,
                        username: username
                    })
                })
                .then(res => res.text())
                .then(data => {
                    //log de server response in console (advies van Johan)
                    console.log("Server response:", data);
                });
            }

            //Voeg neiuwe afbeelding toe aan de database
            function IMGupdaterPHP(name, file, eigenaar) {
                //maak "formData" object om te uploaden
                let formData = new FormData();
                formData.append("title", name);
                formData.append("owner", eigenaar);
                formData.append("image", file);

                //verstuur file naar PHP via POST want dat is beter ofzo
                fetch("IMGupdater.php", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.text())
                .then(data => {
                    console.log("Server response:", data);
                });
            }

            //verwijder de afbeelding
            function IMGdeleter(name){
                let formData = new FormData();
                formData.append("title", name);

                fetch("IMGdeleter.php", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.text())
                .then(data => {
                    console.log("Server response:", data);
                });
            }

            //verander de naam van de afbeelding
            function IMGnameupdate(old_name, new_name){
                fetch("IMGnameupdate.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        new_name: new_name,
                        old_name: old_name
                    })
                })
                .then(res => res.text())
                .then(data => {
                    console.log("Server response:", data);
                });
            }



            //Hieronder alles voor het uploaden van afbeeldingen
            let upload = document.getElementById('imageUpload');
            let image_space = document.querySelector('.image_page');
            let afbeeldingsID = 0;

            upload.addEventListener('change', (event) => {
                let file = event.target.files[0];
                if (!file) return;

                let img = document.createElement('img');
                let name = `${afbeeldingsID}`;
                let y = 1;
                while(all_images_name.includes(name)){
                    y += 1;
                    if(!all_images_name.includes(name + y)){
                        name = name + '_' + y;
                    }
                }
                img.src = URL.createObjectURL(file);
                all_images_name.push(name);
                owned_images_name.push(name);
                all_images_src.push(URL.createObjectURL(file));
                owned_images_src.push(URL.createObjectURL(file));
                img.classList.add("img_page_img");

                img.addEventListener("click", () => {
                    let artNR = all_images_name.indexOf(name);
                    let artNR2 = owned_images_name.indexOf(name);
                    all_images_name.splice(artNR, 1); //splice om de afbeelding er even uit te halen, maar later wordt hij weer toegevoegd
                    owned_images_name.splice(artNR2, 1);
                    let newname = prompt('insert name for image', name);
                    if(newname == null || newname == ""){
                        name = name;
                    }
                    else{
                        name = newname;
                    }
                    let y = 1;
                    while(all_images_name.includes(name)){
                        y += 1;
                        if(!all_images_name.includes(name + '_' + y)){
                            name = name + '_' + y;
                        }
                    }
                    all_images_name.splice(artNR, 0, name); //Hier wordt hij dus weer toegevoegd
                    owned_images_name.splice(artNR, 0, name);
                    IMGnameupdate(img.id, name);
                    img.id = name;
                    txty.textContent = img.id;
                });
                img.addEventListener("contextmenu", e => {
                    let artNR = all_images_name.indexOf(name);
                    let artNR2 = owned_images_name.indexOf(name);

                    e.preventDefault();
                    let yesorno = prompt("Type 'YES' to delete");
                    if(yesorno == "YES"){
                        all_images_name.splice(artNR, 1);
                        owned_images_name.splice(artNR, 1);
                        all_images_src.splice(artNR, 1);
                        owned_images_src.splice(artNR, 1);
                        img.remove();
                    }
                });

                img.id = name;

                let txty = document.createElement('p');
                txty.textContent = img.id;
                txty.classList.add("hidden");
                txty.style.position = "absolute";
                txty.id = all_images_name.indexOf(name)
                txty.style.textShadow = "2px 0 #ffffff, -2px 0 #ffffff, 0 2px #ffffff, 0 -2px #ffffff, 1px 1px #ffffff, -1px -1px #ffffff, 1px -1px #ffffff, -1px 1px #ffffff";
                img.addEventListener("mousemove", (e)=>{
                    txty.style.top = e.pageY + "px";
                    txty.style.left = e.pageX + "px";
                    txty.classList.remove("hidden");
                    setTimeout(() => {
                        txty.classList.add("hidden");
                    }, 10000);
                });
                img.addEventListener("mouseout", ()=>{
                    txty.classList.add("hidden");
                });
                document.body.appendChild(txty);

                document.querySelector(".image_image_page").appendChild(img);

                img.onload = () => URL.revokeObjectURL(img.src);

                IMGupdaterPHP(name, file, username);
            });

            //code voor pagina maken:
            let temp_save = {
                "titel": "",
                "square1_type": "text",
                "square1_contents": "",
                "square2_type": "text",
                "square2_contents": "",
                "square3_type": "text",
                "square3_contents": "",
                "square4_type": "text",
                "square4_contents": ""
            }
            function textsquare(squareNR){
                console.log(`square #${squareNR} is gonna be text`);
                document.getElementById(`back_${squareNR}`).classList.remove("hidden");
                document.querySelectorAll(`.square${squareNR} > *`).forEach((item, index) => {
                    if(item.tagName == "BUTTON"){
                        item.classList.add("hidden");
                    }
                })
                document.getElementById(`textarea_${squareNR}`).value = "";
                document.getElementById(`textarea_${squareNR}`).classList.remove("hidden");
            }
            function imgsquare(squareNR){
                document.querySelectorAll(".listitem").forEach(item => {
                    item.remove();
                })
                console.log(`square #${squareNR} is gonna be an image`);
                document.getElementById(`back_${squareNR}`).classList.remove("hidden");
                document.querySelectorAll(`.square${squareNR} > *`).forEach((item, index) => {
                    if(item.tagName == "BUTTON"){
                        item.classList.add("hidden");
                    }
                })
                document.getElementById(`list_${squareNR}`).classList.remove("hidden");
                for(let x = 0; x < all_images_name.length; x++){
                    let div = document.createElement('div');
                    div.classList.add("listitem");
                    div.id = all_images_name[x];
                    let p = document.createElement('p');
                    p.textContent = div.id;
                    document.getElementById(`list_${squareNR}`).appendChild(div);
                    div.appendChild(p);
                    div.addEventListener("click", () => {
                        setimage(squareNR, div.id);
                    })
                }
            }
            function setimage(squareNR, imgName){
                document.getElementById(`list_${squareNR}`).classList.add("hidden");
                let img = document.createElement('img');
                img.src = all_images_src[all_images_name.indexOf(imgName)];
                img.id = `image_square${squareNR}`;
                img.name = imgName;
                img.style = "max-width: 100%; max-height: 100%; min-width: 25%; min-height: 25%;";
                document.querySelector(`.square${squareNR}`).appendChild(img);
            }
            function back(squareNR){
                document.getElementById(`back_${squareNR}`).classList.add("hidden");
                document.querySelectorAll(`.square${squareNR} > *`).forEach((item, index) => {
                    if(item.tagName == "BUTTON"){
                        item.classList.remove("hidden");
                    }
                    if(item.tagName == "IMG"){
                        item.remove();
                    }
                })
                document.getElementById(`textarea_${squareNR}`).classList.add("hidden");
                document.getElementById(`list_${squareNR}`).classList.add("hidden");
            }

            //Alle variabelen in de functie zetten die de nieuwe pagina opslaat
            function save(){
                temp_save["titel"] = document.querySelector(".title_edit").value;
                for(let x = 1; x < 5; x++){
                    console.log(x);
                    if(!(document.getElementById(`button_${x}`).classList.contains("hidden"))){
                        temp_save[`square${x}_type`] = "text";
                        temp_save[`square${x}_contents`] = "";
                    }
                    else if(!(document.getElementById(`textarea_${x}`).classList.contains("hidden"))){
                        temp_save[`square${x}_type`] = "text";
                        temp_save[`square${x}_contents`] = document.getElementById(`textarea_${x}`).value;
                    }
                    else{
                        temp_save[`square${x}_type`] = "image";
                        temp_save[`square${x}_contents`] = document.getElementById(`image_square${x}`).name;
                    }
                }

                console.log(temp_save);
                if(!(temp_save["titel"] == "") && !(paginas.includes(temp_save["titel"]))){
                    for(let key in temp_save) {
                        temp_save[key] = clean(temp_save[key]);
                    }
                    newpaginaPHP(
                        temp_save["titel"],
                        temp_save["square1_type"],
                        temp_save["square2_type"],
                        temp_save["square3_type"],
                        temp_save["square4_type"],
                        temp_save["square1_contents"],
                        temp_save["square2_contents"],
                        temp_save["square3_contents"],
                        temp_save["square4_contents"],
                        username
                    );
                }
            }

            //Functie om te zorgen dat we niet worden gehackt
            function clean(str){
                str = str.replace(/<br>/g, "-br-");
                str = str.replace(/</g, "");
                str = str.replace(/>/g, "");
                str = str.replace(/\*/g, "");
                str = str.replace(/\|/g, "");
                return str;
            }

            //nieuwe pagina opslaan in database (gewoon het zelfde als die afbeeldingen opslaan, maar dan met meer variabelen)
            function newpaginaPHP(title, square1_type, square2_type, square3_type, square4_type, square1_contents, square2_contents, square3_contents, square4_contents, eigenaar){
                let formData = new FormData();
                formData.append("title", title);
                formData.append("square1_type", square1_type);
                formData.append("square2_type", square2_type);
                formData.append("square3_type", square3_type);
                formData.append("square4_type", square4_type);
                formData.append("square1_inhoud", square1_contents);
                formData.append("square2_inhoud", square2_contents);
                formData.append("square3_inhoud", square3_contents);
                formData.append("square4_inhoud", square4_contents);
                formData.append("eigenaar", eigenaar);

                fetch("newpagina.php", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.text())
                .then(data => {
                    console.log("Server response:", data);
                });
            }
        </script>
    </body>
</html>