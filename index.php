<?php 
    
    require 'inc/data.php';
    require 'inc/language.php';

    $row = [];
    $lang = [];

    if( 
        isset($_GET['lang']) && !empty($_GET['lang']) && 
        isset($LANGUAGES[$_GET['lang']]) && !empty($LANGUAGES[$_GET['lang']])
    ){
        $lang = $LANGUAGES[$_GET['lang']];

        // print_r($lang['Gender']);die;

    }

    if( 
        isset($_GET['code']) && !empty($_GET['code'])
    ){
        $codesArr = array_column($DATA, 'code');

        $index = array_search($_GET['code'], $codesArr);

        if($index !== false && isset($DATA[$index]) && !empty($DATA[$index])){

            $row = $DATA[$index];

        } else {
            echo "Invalid code";die;
        }
    } else {
        echo "Invalid request";die;
    }

    function convertLang($str){

        return isset($GLOBALS['lang'][$str]) && !empty($GLOBALS['lang'][$str]) ? $GLOBALS['lang'][$str] : $str;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PetTracker - <?=$row['petName']?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./assets/images/PT.svg">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://allfont.net/allfont.css?fonts=nunito-bold" rel="stylesheet" type="text/css" />
    <link href="https://allfont.net/allfont.css?fonts=nunito-regular" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/custom.css?v=1.1">
</head>
<body>


    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 main-wrapper <?= $row['gender'] == 'Boy' ? 'male-gender' : 'female-gender' ?>">

            	<div class="language-wrapper text-end" style="position: absolute;top: 10px;right: 10px">
		            <!-- <a href="http://203.190.154.50:8886?code=<?=$_GET['code']?>&lang=en">English</a>,  -->
		            <!-- <a href="http://203.190.154.50:8886?code=<?=$_GET['code']?>&lang=de">German</a> -->
		            <div class="form-check form-switch">
					  	<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" <?= @$_GET['lang'] == 'de' ? 'checked' : '' ?> onchange="changeLangFun(this, 'http://203.190.154.50:8886?code=<?=$_GET['code']?>&lang=de', 'http://203.190.154.50:8886?code=<?=$_GET['code']?>')">
					  	<label class="form-check-label text-white" for="flexSwitchCheckDefault">German</label>
					</div>
		        </div>

                <div class="-sc-14n8dp6-1 yABpr">
                    <img class=" bpStmc" width="150" height="150" src="<?= $row['petImage'] ?? '' ?>">
                </div>

                <div class=" GFQGN">
                    <div class="lfNygl">
                        <div class=" cpplYc">
                            <h1 class=" bEhTVU"><?= $row['petName'] ?? '' ?></h1>
                            <p class=" cJSXoY"><?= $row['petBreed'] ?? '' ?></p>
                        </div>
                        <span style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;">
                            <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;"><img alt="" aria-hidden="true" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzUiIGhlaWdodD0iMzUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgdmVyc2lvbj0iMS4xIi8+" style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;"></span><img src="./assets/images/PT.svg" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                            <noscript></noscript>
                        </span>
                    </div>
                    <p class="gqYpfE"><?= $row['petBio'] ?? '' ?></p>
                    <div class=" btVHhE">
                        <div class=" lofuQh cPITJz">
                            <h4 class="jMZBZt"><?= $row['gender'] ?? '' ?></h4>
                            <p class=" jrRPfz"><?= convertLang('Gender') ?></p>
                            <div class=" oajYe">
                                <span style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;">
                                    <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;"><img alt="" aria-hidden="true" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgdmVyc2lvbj0iMS4xIi8+" style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;"></span><img src="./assets/images/_graphics_green-paw.svg" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                                    <noscript></noscript>
                                </span>
                            </div>
                        </div>
                        <div class="lofuQh gPqnEq">
                            <h4 class=" jMZBZt"><?= $row['age'] ?? '' ?> <?= convertLang('Years')?></h4>
                            <p class="jrRPfz"><?= convertLang('Age') ?></p>
                            <div class=" oajYe">
                                <span style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;">
                                    <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;"><img alt="" aria-hidden="true" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgdmVyc2lvbj0iMS4xIi8+" style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;"></span><img src="./assets/images/_graphics_orange-paw.svg" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                                    <noscript></noscript>
                                </span>
                            </div>
                        </div>
                        <div class=" lofuQh cFjzLi">
                            <h4 class=" jMZBZt"><?= $row['weight'] ?? '' ?> <?= convertLang('Kgs')?></h4>
                            <p class="jrRPfz"><?= convertLang('Weight')?></p>
                            <div class=" oajYe">
                                <span style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;">
                                    <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;"><img alt="" aria-hidden="true" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgdmVyc2lvbj0iMS4xIi8+" style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;"></span><img src="./assets/images/_graphics_blue-paw.svg" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                                    <noscript></noscript>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="kUBAtA">
                        <div class="bSZUNo">
                            <div class=" iBXziQ">
                                <div class=" gdWVnL">
                                    <h1 class=" dyIyZn"><?= substr($row['dadName'], 0, 1) ?></h1>
                                </div>
                                <div class=" ipVQdd">
                                    <div class=" ipVQdd">
                                        <h3 class=" gPFFJn"><?= $row['dadName'] ?? '' ?></h3>
                                        <p class="jlJsrU"><?= $row['dadContact'] ?? '' ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class=" bcIbVr">
                                <a href="tel:<?= $row['dadContact'] ?? '' ?>">
                                    <div class=" jaLoMA">
                                        <span style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;">
                                            <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;"><img alt="" aria-hidden="true" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgdmVyc2lvbj0iMS4xIi8+" style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;"></span><img src="./assets/images/_icons_phone.svg" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                                            <noscript></noscript>
                                        </span>
                                    </div>
                                </a>
                                <a href="sms:<?= $row['dadContact'] ?? '' ?>">
                                    <div class=" dxOVlS">
                                        <span style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;">
                                            <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;"><img alt="" aria-hidden="true" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgdmVyc2lvbj0iMS4xIi8+" style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;"></span><img src="./assets/images/_icons_sms.svg" style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                                            <noscript></noscript>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="kUBAtA">
                        <div class=" hbhCW">
                            <div class=" kIqSGd">
                                <h3 class=" gPFFJn"><?= convertLang('Home')?></h3>
                                <div>
                                    <p class=" nChDs"><?= $row['dadAddress']['dadAddressLine1'] ?? '' ?></p>
                                    <p class=" nChDs"><?= $row['dadAddress']['dadAddressLine2'] ?? '' ?></p>
                                    <p class=" nChDs"><?= $row['dadAddress']['dadAddressLine3'] ?? '' ?></p>
                                    <p class=" nChDs"><?= $row['dadAddress']['dadAddressLine4'] ?? '' ?></p>
                                    <p class=" nChDs"><?= $row['dadAddress']['dadAddressLine5'] ?? '' ?></p>
                                    <p class=" nChDs"><?= $row['dadAddress']['dadAddressLine6'] ?? '' ?></p>
                                    <p class=" nChDs"><?= $row['dadAddress']['dadAddressLine7'] ?? '' ?></p>
                                </div>
                            </div>
                            <div class=" esysDn">
                            	<button class=" gNDZhF"><?= convertLang('Copy')?></button>
                            	<a href="<?=$row['dadLocation']?>" target="_blank">
                            		<button class="petStyles__OpenButton-sc-14n8dp6-36 gwiWmf"><?= convertLang('Open Owner Location')?></button>
                            	</a>

                                <a href="javascript:void(0)" onclick="openMapMyLocation()">
                                    <button class="petStyles__OpenButton-sc-14n8dp6-36 gwiWmf mt-2"><?= convertLang('Open My Location')?></button>
                                </a>

                            </div>

                        </div>
                    </div>
                </div>

                <div class=" wVmJT">
                    <div class=" buWIYt iegzuj">
                        <h3 class=" bYbpcF"><?= convertLang('Behavior')?></h3>
                        <p class=" dlCuXp"><?= convertLang('Good with...')?><br><br><?= convertLang('Kids')?>: <?= $row['behavior']['goodWithKids'] ?? '' ?><br><?= convertLang('Dogs')?>: <?= $row['behavior']['goodWithDogs'] ?? '' ?><br><?= convertLang('Cats')?>: <?= $row['behavior']['goodWithcats'] ?? '' ?><br></p>
                    </div>
                    <div class=" buWIYt iBaJXH">
                        <h3 class=" bYbpcF"><?= convertLang('Health')?></h3>
                        <p class="dlCuXp"><?= convertLang('Allergies')?>: <?= $row['health']['allergies'] ?? '' ?><br><?= convertLang('Medicine')?>: <?= $row['health']['medicine'] ?? '' ?><br><?= convertLang('Neutered/spayed')?>: <?= $row['health']['neutered_spayed'] ?? '' ?><br><br><br></p>
                    </div>
                    <div class=" buWIYt gwIArh">
                        <h3 class=" bYbpcF"><?= convertLang('Provider')?></h3>
                        <p class="dlCuXp"><?= convertLang('Vet name')?>: <?= $row['provider']['vet_name'] ?? '' ?><br><?= convertLang('Vet phone')?> #: <?= $row['provider']['vet_phone'] ?? '' ?><br><?= convertLang('Vet license ID')?>: <?= $row['provider']['vet_license_id'] ?? '' ?><br><?= convertLang('Microchip')?> #: <?= $row['provider']['vet_microchip'] ?? '' ?><br><?= convertLang('Rabies ID')?>: <?= $row['provider']['rabies_id'] ?? '' ?><br></p>
                    </div>
                </div>

                <div class=" keLTaK">
                    <button class=" hEAXFb  jNHwyD" id="shareLocationBtn"><?= convertLang('Notify owner of your location')?></button>
                    
                </div>

            </div>
        </div>
    </div>

    <!-- lost Modal -->
    <div class="modal" id="infoModal" tabindex="-1">
        <div class="modal-dialog  modal-dialog-centered w-300">
            <div class="modal-content" style="box-shadow: rgba(0, 0, 0, 0.2) 0px 0px 10px 0px;border: none;">
                
                <div class="modal-body">
                    <div class="styles-sc-p4c6b3-0 styles__StyledDialogCard-sc-1bpwf9i-0 FJtvq dlygVM">
                        <h2 class="styles__Title-sc-1bpwf9i-2 lacDY"><?= convertLang("This pet may be lost!")?></h2>
                        <div class="styles__DialogCardTextContainer-sc-1bpwf9i-5 hrRmZB">
                            <p class="styles__DialogCardText-sc-1bpwf9i-6 gGdDYU"> <?= convertLang("We'd like to send your current location to pet's owners. They will only be able to see your location at the time of sending (your location is not actively tracked).")?></p>
                            <p class="styles__DialogCardText-sc-1bpwf9i-6 gGdDYU"><?= convertLang("A notification will be displayed asking for permission to access your location. Please click the 'Allow' button.")?></p>
                        </div>
                        <button class="styles__StyledButton-sc-y8ytmq-0 hEAXFb styles__ActionButton-sc-1bpwf9i-3 jJDVNj shareLocationBtnPress"><?= convertLang("Okay")?></button>
                        <button class="styles__StyledButton-sc-y8ytmq-0 cCcOYK styles__CancelButton-sc-1bpwf9i-4 ggENcN"  data-bs-dismiss="modal"><?= convertLang("Ignore")?></button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Share Location Modal -->
    <div class="modal" id="shareLocationModal" tabindex="-1">
        <div class="modal-dialog  modal-dialog-centered w-300">
            <div class="modal-content" style="box-shadow: rgba(0, 0, 0, 0.2) 0px 0px 10px 0px;border: none;">
                
                <div class="modal-body">
                    <div class="styles-sc-p4c6b3-0 styles__StyledDialogCard-sc-1bpwf9i-0 FJtvq dlygVM">
                        <h2 class="styles__Title-sc-1bpwf9i-2 lacDY"><?= convertLang("Location sharing")?></h2>
                        <div class="styles__DialogCardTextContainer-sc-1bpwf9i-5 hrRmZB">
                            <p class="styles__DialogCardText-sc-1bpwf9i-6 gGdDYU"><?= convertLang("Your current GPS location will be sent to pet's owners. pet's owners will only be able to see your location at the time of sending (your location is not actively tracked).")?></p>
                            <p class="styles__DialogCardText-sc-1bpwf9i-6 gGdDYU"><?= convertLang("A notification will be displayed asking for permission to access your location. Please click the 'Allow' button.")?></p>
                        </div>
                        <button class="styles__StyledButton-sc-y8ytmq-0 hEAXFb styles__ActionButton-sc-1bpwf9i-3 jJDVNj shareLocationBtnPress"><?= convertLang("I understand")?></button>
                        <button class="styles__StyledButton-sc-y8ytmq-0 cCcOYK styles__CancelButton-sc-1bpwf9i-4 ggENcN"  data-bs-dismiss="modal"><?= convertLang("Cancel")?></button>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>

<script type="text/javascript">
    
    $(document).ready(function(){
        $("#infoModal").modal('show');

        $("#shareLocationBtn").click(function(){

            $("#shareLocationModal").modal('show');            

        });

        $(".shareLocationBtnPress").click(function(){

            getLocation();

        });
    });

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, error);
        } else {
            alert('Geolocation is not supported by this browser.');
        }
    }

    function showPosition(position) {
        console.log("position", position);
    }

    function error(err) {
        
        alert(err?.message);
    }

    function openMapMyLocation(){

        var url = 'https://www.google.com/maps/@';

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position){

                console.log("openMapMyLocation position", position);

                if(!position?.coords?.latitude || !position?.coords?.longitude){

                    alert("latitude & latitude did not fetched.");
                    return ;
                }

                url += position?.coords?.latitude + "," +position?.coords?.longitude + ',15z?entry=ttu?type=individual';
                if(!window.open(url, '_blank')){

                    window.location.href = url;
                }

            }, error);

        } else {
            alert('Geolocation is not supported by this browser.');
        }
    }

    function changeLangFun(_this, url_de, url_en){

    	if($(_this).is(':checked')){

    		window.location.href = url_de;
    	} else {

    		window.location.href = url_en;
    	}
    }


</script>