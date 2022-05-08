<?php
namespace includes;

class GeneralSettings
{
    
    
    private static $sqlConnect ;
    private $scan= 0;
    private $dt=array();
    function __construct($sqlconnect){
        self::$sqlConnect = $sqlconnect;
    }
    
    public function sanitize_output($buffer){
        $search = array(
            '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
            '/[^\S ]+\</s',     // strip whitespaces before tags, except space
            '/(\s)+/s',         // shorten multiple whitespace sequences
            '/<!--(.|\s)*?-->/' // Remove HTML comments
        );
        
        $replace = array(
            '>',
            '<',
            '\\1',
            ''
        );
        
        $buffer = preg_replace($search, $replace, $buffer);
        
        return $buffer;
    }
    
    
    public function Famo_Redirect($url){
        return header("Location :{$url} ");
    }
    
    
    public static  function Famo_Sql_Result($res,$row=0,$col=0){
        
        $numrows=mysqli_num_rows($res);
        
        if ($numrows && $row <= ($numrows - 1) && $row >= 0) {
            mysqli_data_seek($res, $row);
            $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
            if (isset($resrow[$col])) {
                return $resrow[$col];
            }
        }
        return false;
        
    }
    
    
    public function Famo_CheckUserSessionId($user_id = 0,$session_id='',$platform='web',$table){
      
        if(empty($user_id) || !is_numeric($user_id)|| $user_id <0 ){
            
            return false ;
        }
        
        if(empty($session_id)){
            return false;
        }
        $platform = $this->Famo_Secure($platform);
        $sql ="SELECT COUNT(`id`) AS `session` FROM `{$table}` WHERE `user_id` = `{$user_id}` AND `session_id` =`{$session_id}`";
        
        
        $squery = mysqli_query(self::$sqlConnect, $sql);
        $query_sql = mysqli_fetch_assoc($squery);
        
        if($query_sql['session']>0){
            return true;
        }
        
        return false;
        
    }
    
    public function  Famo_ValidateAcessToken($access_token='',$table){
        
        if(empty($access_token)){
            return false;
        }
        
        $access_token = self::Famo_Secure($access_token);
        $query     = mysqli_query(self::$sqlConnect, "SELECT user_id FROM " . $table . " WHERE `session_id` = '{$access_token}' LIMIT 1");
        $query_sql = mysqli_fetch_assoc($query);
        if ($query_sql['user_id'] > 0) {
            return $query_sql['user_id'];
        }
        return false;
    }
    
    public function ip_in_range($ip, $range) {
        if (strpos($range, '/') == false) {
            $range .= '/32';
        }
        // $range is in IP/CIDR format eg 127.0.0.1/24
        list($range, $netmask) = explode('/', $range, 2);
        $range_decimal    = ip2long($range);
        $ip_decimal       = ip2long($ip);
        $wildcard_decimal = pow(2, (32 - $netmask)) - 1;
        $netmask_decimal  = ~$wildcard_decimal;
        return (($ip_decimal & $netmask_decimal) == ($range_decimal & $netmask_decimal));
    }
    
    function br2nl($st) {
        $breaks   = array(
            "\r\n",
            "\r",
            "\n"
        );
        $st       = str_replace($breaks, "", $st);
        $st_no_lb = preg_replace("/\r|\n/", "", $st);
        return preg_replace('/<br(\s+)?\/?>/i', "\r", $st_no_lb);
    }
    function br2nlf($st) {
        $breaks   = array(
            "\r\n",
            "\r",
            "\n"
        );
        $st       = str_replace($breaks, "", $st);
        $st_no_lb = preg_replace("/\r|\n/", "", $st);
        $st =  preg_replace('/<br(\s+)?\/?>/i', "\r", $st_no_lb);
        return str_replace('[nl]', "\r", $st);
    }
    
    public function Famo_UrlDomain($url){
        $host = @parse_url($url,PHP_URL_HOST);
        if (!$host){
            $host = $url;
        }
        if (substr($host, 0, 4) == "www."){
            $host = substr($host, 4);
        }
        if (strlen($host) > 50){
            $host = substr($host, 0, 47) . '...';
        }
        return $host;
    }
    
    public static function  Famo_Secure($string,$censored_words=1,$br=true,$strip=0){
        
        $string  = trim($string);
        $string = self::cleanString($string);
        $string = mysqli_real_escape_string(self::sqlConnect, $string);
        $string =htmlspecialchars($string,ENT_QUOTES);
        if ($br == true) {
            $string = str_replace('\r\n', " <br>", $string);
            $string = str_replace('\n\r', " <br>", $string);
            $string = str_replace('\r', " <br>", $string);
            $string = str_replace('\n', " <br>", $string);
        } else {
            $string = str_replace('\r\n', "", $string);
            $string = str_replace('\n\r', "", $string);
            $string = str_replace('\r', "", $string);
            $string = str_replace('\n', "", $string);
        }
        if ($strip == 1) {
            $string = stripslashes($string);
        }
        $string = str_replace('&amp;#', '&#', $string);
        if ($censored_words == 1) {
            global $config;
            $censored_words = @explode(",", $config['censored_words']);
            foreach ($censored_words as $censored_word) {
                $censored_word = trim($censored_word);
                $string        = str_replace($censored_word, '****', $string);
            }
        }
        return $string;
        
    }
    
    
    public static function   cleanString($string) {
        return $string = preg_replace("/&#?[a-z0-9]+;/i","", $string);
    }
    public static  function getConnection(){
        return self::$sqlConnect;
        
    }
    
    public function Famo_Decode($string){
        return htmlspecialchars_decode($string);
    }
    
    
    public function Famo_BbcodeSecure($string) {
       $sqlConnect=self::$sqlConnect;
        $string = trim($string);
        $string = mysqli_real_escape_string($sqlConnect, $string);
        $string = htmlspecialchars($string, ENT_QUOTES);
        $string = str_replace('\r\n', "[nl]", $string);
        $string = str_replace('\n\r', "[nl]", $string);
        $string = str_replace('\r', "[nl]", $string);
        $string = str_replace('\n', "[nl]", $string);
        $string = str_replace('&amp;#', '&#', $string);
        $string = strip_tags($string);
        $string = stripslashes($string);
        return $string;
    }
    
    public function Famo_GenerateKey($minlength = 20, $maxlength = 20, $uselower = true, $useupper = true, $usenumbers = true, $usespecial = false) {
        $charset = '';
        if ($uselower) {
            $charset .= "abcdefghijklmnopqrstuvwxyz";
        }
        if ($useupper) {
            $charset .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        }
        if ($usenumbers) {
            $charset .= "123456789";
        }
        if ($usespecial) {
            $charset .= "~@#$%^*()_+-={}|][";
        }
        if ($minlength > $maxlength) {
            $length = mt_rand($maxlength, $minlength);
        } else {
            $length = mt_rand($minlength, $maxlength);
        }
        $key = '';
        for ($i = 0; $i < $length; $i++) {
            $key .= $charset[(mt_rand(0, strlen($charset) - 1))];
        }
        return $key;
    }
    
    
    
    
    
    
    
   public  function Famo_CropAvatarImage($file = '', $data = array()) {
        
        if (empty($file)) {
            return false;
        }
        if (!isset($data['x']) || !isset($data['y']) || !isset($data['w']) || !isset($data['h'])) {
            return false;
        }
        
        if (!file_exists($file)) {
            $get_media = file_put_contents($file, file_get_contents(Wo_GetMedia($file)));
        }
        
        if (!file_exists($file)) {
            return false;
        }
        
        $imgsize = @getimagesize($file);
        if (empty($imgsize)) {
            return false;
        }
        
        $width = $data['w'];
        $height = $data['h'];
        $source_x = $data['x'];
        $source_y = $data['y'];
        $mime    = $imgsize['mime'];
        $image   = "imagejpeg";
        switch ($mime) {
            case 'image/gif':
                $image_create = "imagecreatefromgif";
                break;
            case 'image/png':
                $image_create = "imagecreatefrompng";
                break;
            case 'image/jpeg':
                $image_create = "imagecreatefromjpeg";
                break;
            default:
                return false;
                break;
        }
        $dest = imagecreatetruecolor($width, $height);
        $src = $image_create($file);
        $file = str_replace('_full', '', $file);
        imagecopy($dest, $src, 30, 30, $source_x, $source_y, $width, $height);
        $to_crop_array = array('x' => $source_x , 'y' => $source_y, 'width' => $width, 'height' => $height);
        $dest = imagecrop($src, $to_crop_array);
        imagejpeg($dest, $file, 100);
       $this->Famo_Resize_Crop_Image($this->dt['profile_picture_width_crop'], $this->dt['profile_picture_height_crop'], $file, $file, 80);
       // $s3 = Wo_UploadToS3($file);
        return true;
    }
    function validate_ip($ip) {
        if (strtolower($ip) === 'unknown')
            return false;
            $ip = ip2long($ip);
            if ($ip !== false && $ip !== -1) {
                $ip = sprintf('%u', $ip);
                if ($ip >= 0 && $ip <= 50331647)
                    return false;
                    if ($ip >= 167772160 && $ip <= 184549375)
                        return false;
                        if ($ip >= 2130706432 && $ip <= 2147483647)
                            return false;
                            if ($ip >= 2851995648 && $ip <= 2852061183)
                                return false;
                                if ($ip >= 2886729728 && $ip <= 2887778303)
                                    return false;
                                    if ($ip >= 3221225984 && $ip <= 3221226239)
                                        return false;
                                        if ($ip >= 3232235520 && $ip <= 3232301055)
                                            return false;
                                            if ($ip >= 4294967040)
                                                return false;
            }
            return true;
    }
    
    function get_ip_address() {
        if (!empty($_SERVER['HTTP_X_FORWARDED']) && $this->validate_ip($_SERVER['HTTP_X_FORWARDED']))
            return $_SERVER['HTTP_X_FORWARDED'];
            if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && $this->validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
                return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
                if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && $this->validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
                    return $_SERVER['HTTP_FORWARDED_FOR'];
                    if (!empty($_SERVER['HTTP_FORWARDED']) && $this->validate_ip($_SERVER['HTTP_FORWARDED']))
                        return $_SERVER['HTTP_FORWARDED'];
                        return $_SERVER['REMOTE_ADDR'];
    }
    
    
   public  function Famo_Resize_Crop_Image($max_width, $max_height, $source_file, $dst_dir, $quality = 80) {
        $imgsize = @getimagesize($source_file);
        $width   = $imgsize[0];
        $height  = $imgsize[1];
        $mime    = $imgsize['mime'];
        $image   = "imagejpeg";
        switch ($mime) {
            case 'image/gif':
                $image_create = "imagecreatefromgif";
                break;
            case 'image/png':
                $image_create = "imagecreatefrompng";
                break;
            case 'image/jpeg':
                $image_create = "imagecreatefromjpeg";
                break;
            default:
                return false;
                break;
        }
        $dst_img = @imagecreatetruecolor($max_width, $max_height);
        $src_img = @$image_create($source_file);
        if (function_exists('exif_read_data')) {
            $exif          = @exif_read_data($source_file);
            $another_image = false;
            if (!empty($exif['Orientation'])) {
                switch ($exif['Orientation']) {
                    case 3:
                        $src_img = @imagerotate($src_img, 180, 0);
                        @imagejpeg($src_img, $dst_dir, $quality);
                        $another_image = true;
                        break;
                    case 6:
                        $src_img = @imagerotate($src_img, -90, 0);
                        @imagejpeg($src_img, $dst_dir, $quality);
                        $another_image = true;
                        break;
                    case 8:
                        $src_img = @imagerotate($src_img, 90, 0);
                        @imagejpeg($src_img, $dst_dir, $quality);
                        $another_image = true;
                        break;
                }
            }
            if ($another_image == true) {
                $imgsize = @getimagesize($dst_dir);
                if ($width > 0 && $height > 0) {
                    $width  = $imgsize[0];
                    $height = $imgsize[1];
                }
            }
        }
        @$width_new = $height * $max_width / $max_height;
        @$height_new = $width * $max_height / $max_width;
        if ($width_new > $width) {
            $h_point = (($height - $height_new) / 2);
            @imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
        } else {
            $w_point = (($width - $width_new) / 2);
            @imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
        }
        @imagejpeg($dst_img, $dst_dir, $quality);
        if ($dst_img)
            @imagedestroy($dst_img);
            if ($src_img)
                @imagedestroy($src_img);
                return true;
    }
    function getBaseUrl() {
        $currentPath = $_SERVER['PHP_SELF'];
        $pathInfo = pathinfo($currentPath);
        $hostName = $_SERVER['HTTP_HOST'];
        return $hostName.$pathInfo['dirname'];
    }
    
    function Famo_ReturnBytes($val) {
        $val  = trim($val);
        $last = strtolower($val[strlen($val) - 1]);
        switch ($last) {
            case 'g':
                $val *= 1024;
            case 'm':
                $val *= 1024;
            case 'k':
                $val *= 1024;
        }
        return $val;
    }
    
    function Famo_MaxFileUpload() {
        //select maximum upload size
        $max_upload   =  $this->Famo_ReturnBytes(ini_get('upload_max_filesize'));
        //select post limit
        $max_post     = $this->Famo_ReturnBytes(ini_get('post_max_size'));
        //select memory limit
        $memory_limit = $this->Famo_ReturnBytes(ini_get('memory_limit'));
        // return the smallest of them, this defines the real limit
        return min($max_upload, $max_post, $memory_limit);
    }
    
    function Famo_isSecure() {
        return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443;
    }
    
    
}

