<?php

/**
 * Retrieves a configuration value from the specified configuration file.
 *
 * @param string $configFileName The name of the configuration file.
 * @param string $key            The key of the configuration value to retrieve.
 * @return mixed                 The configuration value corresponding to the given key.
 * @throws FileNotFoundException If the configuration file is not found.
 * @throws KeyNotFoundException  If the specified key is not found in the configuration file.
 */
function config(string $configFileName, string $key): mixed
{
    $safePath = get_secure_config_file_path($configFileName);

    if (!file_exists($safePath)) {
        error_log("Configuration file '$configFileName' not found at path '$safePath'.",LOG_ERR,"./sysLogs.log");
        throw new FileNotFoundException("Configuration file '$configFileName' not found at path '$safePath'.");
    }

    $config = require $safePath;

    if (!is_array($config)) {
        error_log("Configuration file '$configFileName' does not return an array.",LOG_ERR,"./sysLogs.log");
        throw new InvalidConfigException("Configuration file '$configFileName' does not return an array.");
    }

    if (!array_key_exists($key, $config)) {
        error_log("Key '$key' not found in configuration file '$configFileName'.",LOG_ERR,"./sysLogs.log");       
        throw new KeyNotFoundException("Key '$key' not found in configuration file '$configFileName'.");
    }

    return $config[$key];
}

/**
 * Generates a secure file path for the specified configuration file.
 *
 * @param string $configFileName The name of the configuration file.
 * @return string                The secure file path for the configuration file.
 */
function get_secure_config_file_path(string $configFileName): string
{
    // sanitize file name and build secure path
    $safeFileName = preg_replace('/[^a-zA-Z0-9_\.-]/', '', $configFileName);
    return "./config/{$safeFileName}.php";
}


function validate($input): string
{
    $input = trim($input);
    $input = stripslashes($input);
    return htmlspecialchars($input);
}


function checkLogin($UserName, $Password , $ConnStrx): array
{
    // Use prepared statement to protect against SQL injection
    $query = "SELECT usrIdpk,usrName,usrFirstName,usrLastName,usrOtherName,usrEmailAddress,usrPassword,usrIsAdmin,usrIsActive, COUNT(*) as Result FROM tblUsers WHERE usrName = ? AND usrPassword = ? group by usrIdpk";
    $stmt = mysqli_prepare($ConnStrx, $query);
    mysqli_stmt_bind_param($stmt, "ss", $UserName, $Password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt,$user_id,$user_name,$first_name,$last_name, $other_name, $email, $password, $isAdmin,$isActive,$count);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    if ($count > 0) {
        return array(
            'authenticated' => true,
            'user_id' => $user_id,
            'user_name' => $user_name,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'other_name' => $other_name,
            'email' => $email,
            'password' => $password,
            'isAdmin' => $isAdmin,
            'isActive' => $isActive
        );
    } else {
        return array('authenticated' => false);
    }
}


function readData($filePath): array
{
    $file = fopen($filePath, 'r');
    if (!$file) {
        throw new Exception("Failed to open file: $filePath");
    }

    // Read the header row
    $headers = fgetcsv($file, 1000, ",");
    if ($headers === false) {
        fclose($file);
        throw new Exception("Failed to read header from file: $filePath");
    }

    // Initialize the data array
    $data = [];

    // Read the remaining rows
    while (($row = fgetcsv($file, 1000, ",")) !== false) {
        $data[] = $row;
    }

    fclose($file);
    return ['headers' => $headers, 'data' => $data];
}

function displayData($filePath)
{
    $result = readData($filePath);
    $headers = $result['headers'];
    $data = $result['data'];
    
    
    echo "<table border='1'>";
    echo "<tr>";
    foreach ($headers as $header) {
        echo "<th>$header</th>";
    }
    echo "</tr>";
    foreach ($data as $row) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>$cell</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}


function retrieveDetails($array,$keys): array
{
    $array2 = array(); 
    foreach($array as $key => $value){
        $array2[] =  $value[$keys] ;
    }
    return $array2;
}
?>
