<?php
/**
* PHP Obfuscator & Encoder
* Author : namdevel <https://github.com/namdevel>
* Created at 01-03-2020
* Last Modified at 18-03-2020
*/

class Obfuscator
{
    protected $_file;
    protected $_signature;
    protected $_local;
	protected $_exploder;
	protected $_key;
	protected $_secret;
	
    public function __construct($file)
    {
        $this->_file = $file;
        $this->_signature = sha1(microtime());
        $this->_local = "_NAMDEVEL_" . $this->md5rand(8);
		$this->_exploder = substr(base64_encode(md5(microtime())), 0,5);
		$this->_key = sha1(time());
		$this->_secret = md5(time());
    }

    public function run()
    {
        $content = $this->e($this->get());
		$md1 = $this->md5rand(5);$md2 = $this->md5rand(5);$md3 = $this->md5rand(5);$md4 = $this->md5rand(7);$md5 = $this->md5rand(7);$md6 = $this->md5rand(7);
		$layer_1 = 'new Namdevel;class Namdevel{public function __construct(){if(!preg_match("#'.$this->_signature.'#",file_get_contents('.$this->_local.'))){exit("NAMDEVEL - Signature verification failed, visit https://github.com/namdevel");}if(count(file('.$this->_local.'))!=9){exit("NAMDEVEL - File corrupt, visit https://github.com/namdevel");}if(!preg_match("#Obfuscation provided by NAMDEVEL|https://github.com/namdevel/#",file_get_contents('.$this->_local.'))){exit("NAMDEVEL - File corrupt, visit https://github.com/namdevel");}$this->load('.$this->_local.');}protected function load($s){if(!$s){return false;}$c=explode("Namdevel::",file_get_contents($s));$sx=gzinflate(base64_decode(str_replace("_$\_","",$c[1])));$x=gzinflate(hex2bin(json_decode($sx,true)["alva"]));$k=sha1("'.$this->_key.'".strtoupper(md5("'.$this->_secret.'")));$sl=strlen($x);$kl=strlen($k);$j=0;$dt="";for($i=0;$i<$sl;$i+=2){$os=hexdec(base_convert(strrev(substr($x,$i,2)),36,16));if($j==$kl){$j=0;}$ok=ord(substr($k,$j,1));$j++;$dt.=chr($os-$ok);}eval($dt);}}';
		$layer_2 = 'call_user_func("run_reflection");function run_reflection(){return eval(strrev(gzinflate(base64_decode(explode("'.$this->_exploder.'",preg_replace("_@_","",file_get_contents('.$this->_local.')))[1]))));}';
		$layer_3 = $this->s('$NAMDEVEL_'.$md1.'=function($NAMDEVEL_'.$md2.',$NAMDEVEL_'.$md3.'){@eval($NAMDEVEL_'.$md2.'(base64_decode($NAMDEVEL_'.$md3.')));};$NAMDEVEL_'.$md1.'(hex2bin("'.bin2hex('gzinflate').'"),explode(strrev("::levedmaN"),@file_get_contents('.$this->_local.'))[2]);');
		$layer_4 = base64_encode('$NAMDEVEL_'.$md4.'=function($str="'.str_replace(array('"', '$'), array('\"', '\$'), $layer_3).'"){$ky=str_replace(chr(32),"","12345678");if(strlen($ky)<8)exit();$kl=strlen($ky)<32?strlen($ky):32;$k=array();for($i=0;$i<$kl;$i++){$k[$i]=ord($ky{$i})&0x1F;}$j=0;for($i=0;$i<strlen($str);$i++){$e=ord($str{$i});$str{$i}=$e&0xE0?chr($e^$k[$j]):chr($e);$j++;$j=$j==$kl?0:$j;}eval($str);};$NAMDEVEL_'.$md4.'();');
		
		$output = '<?php
/*
#################################################
* Obfuscation provided by NAMDEVEL
* URL : https://github.com/namdevel/
* Signature : '.$this->_signature.'
#################################################
*/
const '.$this->_local.'=__FILE__;$NAMDEVEL_'.$md5.'="'.$this->h('base64_decode').'";$NAMDEVEL_'.$md6.'="'.$this->h($layer_4).'";eval($NAMDEVEL_'.$md5.'($NAMDEVEL_'.$md6.'));__halt_compiler();NAMDEVEL.ID::'. $this->_exploder . wordwrap(base64_encode(gzdeflate(strrev($layer_1))),50,'_@_',true) . $this->_exploder .'$Namdevel::'.wordwrap(base64_encode(gzdeflate($content)),50,'_$_',true).'Namdevel::'.base64_encode(gzdeflate($layer_2));
		
		return $this->w($output);
    }

    protected function get()
    {
        $file = file_get_contents($this->_file);
        return preg_replace(array(
            '/<(\?|\%)\=?(php)?/',
            '/(\%|\?)>/'
        ) , array(
            '',
            ''
        ) , $file);
    }

    protected function h($temp)
    {
        $content = "";
        for ($index = 0;$index < strlen($temp);$index++)
        {
            $content .= "\\x" . bin2hex($temp[$index]);
        }
        return $content;
    }

    protected function w($data)
    {
        $file = fopen("file_encoded.php", "w");
        fwrite($file, $data);
        fclose($file);
    }

    protected function md5rand($length = 5)
    {
        return substr(md5(microtime()) , 0, $length);
    }

    protected function e($s)
    {
        $k = sha1($this->_key . strtoupper(md5($this->_secret)));
        if (!$s)
        {
            return false;
        }
        $sl = strlen($s);
        $kl = strlen($k);
        $j = 0;
        $ct = '';
        for ($i = 0;$i < $sl;$i++)
        {
            $os = ord(substr($s, $i, 1));
            if ($j == $kl)
            {
                $j = 0;
            }
            $ok = ord(substr($k, $j, 1));
            $j++;
            $ct .= strrev(base_convert(dechex($os + $ok) , 16, 36));
        }

        $namdevel = array(
            "thomas" => base64_encode(gzdeflate($ct)) ,
            "alva" => bin2hex(gzdeflate($ct)) ,
            "edison" => strrev(base64_encode(gzdeflate($ct)))
        );
        return json_encode($namdevel);
    }

    protected function s($str, $ky = '12345678')
    {
        if ($ky == '') return $str;
        $ky = str_replace(chr(32) , '', $ky);
        if (strlen($ky) < 8) exit();
        $kl = strlen($ky) < 32 ? strlen($ky) : 32;
        $k = array();
        for ($i = 0;$i < $kl;$i++)
        {
            $k[$i] = ord($ky{$i}) & 0x1F;
        }
        $j = 0;
        for ($i = 0;$i < strlen($str);$i++)
        {
            $e = ord($str{$i});
            $str{$i} = $e & 0xE0 ? chr($e ^ $k[$j]) : chr($e);
            $j++;
            $j = $j == $kl ? 0 : $j;
        }
        return $str;
    }

}

