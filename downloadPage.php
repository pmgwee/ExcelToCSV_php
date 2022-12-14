<?php
    session_start();

    if(isset($_FILES['userFile']))
    {
        // echo file status for user;
        $phpFileUploadErrors = array(
            0 => 'There is no error, the file uploaded with success',
            1 => 'No file was uploaded',
            2 => 'Missing a temporary folder',
        );

        //Set the error becomes false
        $ext_error = false;
        //acceptable file format for the array
        $extensions = array('xlsx', 'xls');
        //explode() function breaks a string into an array to determine the file extension type
        $file_ext = explode('.', $_FILES['userFile']['name']);
        $file_ext = end($file_ext);

        //Store the uploaded userFile_name into the file_name variable
        $file_name = $_FILES['userFile']["name"];

        //Check if the file extension is in the array
        $file_name_no_ext= substr($file_name, 0, strrpos($file_name, '.'));
        $_SESSION['ft'] = $file_name_no_ext;

        //initialize the directory path for the file_name variable
        $file_name = "\"".$file_name."\"";

        //Set the extension_error becomes true
        if(!in_array($file_ext, $extensions))
        {
            $ext_error = true;
        }

        if($ext_error)
        {
            echo "Invalid File extension!";
            echo "We only accept excel file.";
            include 'index.php';
        }else {
            //move the uploaded userFile_name to the convertedFile_file folder
            move_uploaded_file($_FILES['userFile']['tmp_name'], 'convertedFile/' . $_FILES['userFile']['name']);

            //: version (docker run for linux)
//            exec("javac -classpath \".:lib/commons-codec-1.15.jar:lib/commons-collections4-4.4.jar:lib/commons-compress-1.21.jar:lib/commons-io-2.11.0.jar:lib/commons-logging-1.2.jar:lib/commons-math3-3.6.1.jar:lib/curvesapi-1.07.jar:lib/jakarta.activation-2.0.1.jar:lib/jakarta.xml.bind-api-3.0.1.jar:lib/log4j-api-2.18.0.jar:lib/poi-5.2.3.jar:lib/poi-examples-5.2.3.jar:lib/poi-excelant-5.2.3.jar:lib/poi-javadoc-5.2.3.jar:lib/poi-ooxml-5.2.3.jar:lib/poi-ooxml-full-5.2.3.jar:lib/poi-ooxml-lite-5.2.3.jar:lib/poi-scratchpad-5.2.3.jar:lib/slf4j-api-1.7.36.jar:lib/SparseBitSet-1.2.jar:lib/xmlbeans-5.1.1.jar\" fileConverter.java");
//            echo exec("java -classpath \".:lib/commons-codec-1.15.jar:lib/commons-collections4-4.4.jar:lib/commons-compress-1.21.jar:lib/commons-io-2.11.0.jar:lib/commons-logging-1.2.jar:lib/commons-math3-3.6.1.jar:lib/curvesapi-1.07.jar:lib/jakarta.activation-2.0.1.jar:lib/jakarta.xml.bind-api-3.0.1.jar:lib/log4j-api-2.18.0.jar:lib/poi-5.2.3.jar:lib/poi-examples-5.2.3.jar:lib/poi-excelant-5.2.3.jar:lib/poi-javadoc-5.2.3.jar:lib/poi-ooxml-5.2.3.jar:lib/poi-ooxml-full-5.2.3.jar:lib/poi-ooxml-lite-5.2.3.jar:lib/poi-scratchpad-5.2.3.jar:lib/slf4j-api-1.7.36.jar:lib/SparseBitSet-1.2.jar:lib/xmlbeans-5.1.1.jar\" fileConverter ".$file_name);

            //; version (localhost run for windows)
              exec("javac -classpath .;lib/commons-codec-1.15.jar;lib/commons-collections4-4.4.jar;lib/commons-compress-1.21.jar;lib/commons-io-2.11.0.jar;lib/commons-logging-1.2.jar;lib/commons-math3-3.6.1.jar;lib/curvesapi-1.07.jar;lib/jakarta.activation-2.0.1.jar;lib/jakarta.xml.bind-api-3.0.1.jar;lib/log4j-api-2.18.0.jar;lib/poi-5.2.3.jar;lib/poi-examples-5.2.3.jar;lib/poi-excelant-5.2.3.jar;lib/poi-javadoc-5.2.3.jar;lib/poi-ooxml-5.2.3.jar;lib/poi-ooxml-full-5.2.3.jar;lib/poi-ooxml-lite-5.2.3.jar;lib/poi-scratchpad-5.2.3.jar;lib/slf4j-api-1.7.36.jar;lib/SparseBitSet-1.2.jar;lib/xmlbeans-5.1.1.jar fileConverter.java");
              echo exec("java -classpath .;lib/commons-codec-1.15.jar;lib/commons-collections4-4.4.jar;lib/commons-compress-1.21.jar;lib/commons-io-2.11.0.jar;lib/commons-logging-1.2.jar;lib/commons-math3-3.6.1.jar;lib/curvesapi-1.07.jar;lib/jakarta.activation-2.0.1.jar;lib/jakarta.xml.bind-api-3.0.1.jar;lib/log4j-api-2.18.0.jar;lib/poi-5.2.3.jar;lib/poi-examples-5.2.3.jar;lib/poi-excelant-5.2.3.jar;lib/poi-javadoc-5.2.3.jar;lib/poi-ooxml-5.2.3.jar;lib/poi-ooxml-full-5.2.3.jar;lib/poi-ooxml-lite-5.2.3.jar;lib/poi-scratchpad-5.2.3.jar;lib/slf4j-api-1.7.36.jar;lib/SparseBitSet-1.2.jar;lib/xmlbeans-5.1.1.jar fileConverter ".$file_name);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--CSS-->
    <link rel="stylesheet" href="css/Download.css">
    <title>Download CSV converted</title>
</head>
<body>
<article>
    <div class="itemWrapper">
        <div class="itemBox">
            <div class="Title">
                <h1>Success.We converted your file.</h1>
                <h3>Your download will start after you clicked the button.Any Error please click here</h3>
            </div>

            <div class="uploadContainer">
                <div class="Card">
                    <img src="Public/downloadFile.png" alt="fileIcon" width="313" height="313">
                    <a href = "/ExcelToCSV_php/downloadFile.php" >
                        <button type="button" >Download</button>
                    </a>
                </div>
                <div class="Submit">
                    <a href="/ExcelToCSV_php/index.php"><button type="button" >Convert Again</button></a>
                </div>
            </div>
            <div class="descContainer">
                <div class="step1">
                    <div class="imgBox" >
                        <img src="Public/pm_ProfilePicture.png" alt="fileIcon" width="270" height="269">
                    </div>
                    <p class="underline-text-animation">Gwee Per Ming</p>
                    <p class="underline-text-animation">159372</p>
                </div>

                <div class="step2">
                    <div class="imgBox">
                        <img src="Public/wk_ProfilePicture.png" alt="convertIcon" width="260" height="269">
                    </div>

                    <p class="underline-text-animation">Thong Wai Hong</p>
                    <p class="underline-text-animation">158876</p>
                </div>

                <div class="step3">
                    <div class="imgBox">
                        <img src="Public/yq_ProfilePicture.jpg" alt="downloadIcon" width="260" height="269">
                    </div>
                    <p class="underline-text-animation">Ooi Yong Qin</p>
                    <p class="underline-text-animation">159067</p>
                </div>
            </div>
        </div>

    </div>
</article>
</body>


