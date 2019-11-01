<?php

use App\Web\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Lang;

if( ! function_exists('authHighestLevel') ){
    function authHighestLevel()
    {
        return 'admin';
    }
}

if( ! function_exists('fa') ){
    function fa($icon='pencil', $addClass='', $style='')
    {
        return '<i class="fa fa-'.$icon.' '.$addClass.'" style="'.$style.'"></i>';
    }
}

if( ! function_exists('modal_loading') )
{
    function modal_loading()
    {
        return '<p class="text-center modal-loading"><i class="icon-loader spinner"></i></p>';
    }
}

if( ! function_exists('str_limit') )
{
    function str_limit($text, $limit){

        if(empty($text)){
            return null;
        }

        $text = strip_tags($text);
        $count = strlen($text);   /*hitung jumlah karakter*/
        if($count > $limit){
            $character = substr($text, 0, $limit)." ...";    /*membatasi jumlah karakter*/
        }else{
            $character = $text;
        }

        return $character;

    }
}

if( ! function_exists('initials') )
{
    function initials($str) {
        $ret = '';
        foreach (explode(' ', $str) as $word)
            $ret .= strtoupper($word[0]);
        return $ret;
    }
}

if( ! function_exists('image_fit') )
{
    function image_fit($id, $width, $height, callable $callback=null)
    {
        $url = url('thumbnail/fit', [$id, $width, $height]);

        if(is_callable($callback)){
            return $callback($url);
        }else{
            return $url;
        }
    }
}

if( ! function_exists('thumbnail') )
{
    function thumbnail($link)
    {
        parse_str( parse_url( $link, PHP_URL_QUERY ), $code );
        return asset("https://img.youtube.com/vi/".$code['v']."/0.jpg");
    }
}

if( ! function_exists('table_row_number') ){
    function table_row_number($paginate, $index)
    {
        return $index+1+(($paginate->currentPage()-1)*$paginate->perPage());
    }
}

if( ! function_exists('row_number') ){
    function row_number($index)
    {
        return $index+1;
    }
}

if( ! function_exists('pretty_date') )
{
    function pretty_date($date_and_time, $icons = false, $detail = false, $time = false)
    {
        if($date_and_time == '0000-00-00 00:00:00') return null;
        
        Carbon::setLocale('id');
        $template = '';

        $date = Carbon::parse($date_and_time);
        if($date->diffInDays(Carbon::now()) >= 1){
            $icon = fa('calendar');
        }else{
            $icon = fa('clock-o');
        }

        $l     = '';
        $day   = $date->format('d');
        $month = $date->format('n');
        $year  = $date->format('Y');
        $times = '';

        if($icons){
            $icon = $icon;
        }else{
            $icon = '';
        }

        if($detail){
            $l = Lang::get('date.day.' . $date->format('l')).',';
            $month = Lang::get('date.month.' . $month);
        }else{
            $month = Lang::get('date.short.month.' . $month).',';
        }

        if($time){
            $times = $date->format('H:i:s A');
        }

        if($date->diffInDays(Carbon::now()) >= 2){
            $template = sprintf('%d %s %d', $day, $month, $year);
            if($detail) $template = sprintf('%s %d %s %d', $l, $day, $month, $year);
        }
        else if($date->diffInDays(Carbon::now()) >= 1){
            $template = sprintf('%s', 'kemarin');
        }
        else{
            $template = sprintf(' %s', $date->diffForHumans());
        }

        $times = ($time) ? ', '.$times : '';
        
        if($detail && $times){
            return $icon.' '.$template.$times;
        }
        else{
            return $icon.' '.$template.$times;
        }
    }
}

if( ! function_exists('format_time') )
{
    function format_time($date, $short = false, $time_info = false)
    {
        if($date == '0000-00-00 00:00:00') return null;

        Carbon::setLocale('id');
        $template = '';

        $date = Carbon::parse($date);

        $time_info = ($time_info) ? 'A' : '';

        if($time_info){
            $time = ($short) ? $template = 'h:i '.$time_info : $template = 'h:i:s '.$time_info;
        }else{
            $time = ($short) ? $template = 'H:i '.$time_info : $template = 'H:i:s';
        }

        return $date->format($template);
    }
}

if( ! function_exists('format_date') )
{
    function format_date($date, $format=0, $separator="-", $time=false, $D=false, $short=false)
    {
        if($date == '0000-00-00 00:00:00') return null;

        $l        = Carbon::parse($date)->format('l');
        $day      = Carbon::parse($date)->format('d');
        $month    = Carbon::parse($date)->format('n');
        $year     = Carbon::parse($date)->format('Y');
        if($short){
            $times = format_time($date, $short);
        }else{
            $times = format_time($date);
        }

        $template = '%s'.$separator.'%s'.$separator.'%d';
        $result = '';
        
        switch ($format) {
            case 1:
                if($short){
                    $month = Lang::get('date.short.month.' . $month);
                }else{
                    $month = Lang::get('date.month.' . $month);
                }
                $result = sprintf($template, $day, $month, $year);
            break;
            
            case 2:
                $month = str_pad($month, 2, "0", STR_PAD_LEFT);
                $result = sprintf($template, $day, $month, $year);
            break;

            default:
                $result = $date;
            break;
        }
        $l = Lang::get('date.day.' . $l).', ';
        $time = ($time) ? ', '.$times : '';
        $l = ($D) ? $l : '';
        return $l.$result.$time;
    }
}

if( ! function_exists('years_old') )
{
    function years_old($date)
    {
        $year  = Carbon::parse($date)->age;
        $month = Carbon::parse($date)->diffInMonths();
        $day   = Carbon::parse($date)->diffInDays();
        $hour  = Carbon::parse($date)->diffInHours();
        $minute= Carbon::parse($date)->diffInMinutes();
        
        if($date != '0000-00-00'){
            if($year > 0){
                $template = sprintf('%s tahun lalu', $year);
            }else{
                if($month > 0){
                    $template = sprintf('%s bulan lalu', $month);
                }else{
                    if($day > 0){
                        $template = sprintf('%s hari lalu', $day);
                    }else{
                        if($hour > 0){
                            $template = sprintf('%s jam lalu', $hour);
                        }else{
                            $template = sprintf('%s menit lalu', $minute);
                        }
                    }
                }
            }
        }
        else{
            $template = '-';
        }

        return $template;
    }
}

if( ! function_exists('duration') )
{
    function duration($start, $end, $format='Y-m-d H:i:s')
    {

        if($start != ' ' && $end != ' '){
            $date1 = Carbon::createFromFormat($format, $start);
            $date2 = Carbon::createFromFormat($format, $end);
            $interval = $date1->diff($date2);

            if($interval->format('%d') > 0){
                return $interval->format('%d').' Hari, '.$interval->format('%h')." Jam, ".$interval->format('%i')." Menit";
            }else{
                if($interval->format('%h') > 0){
                    return $interval->format('%h')." Jam, ".$interval->format('%i')." Menit";
                }else{
                    return $interval->format('%i')." Menit";
                }
            }
        }else{
            if($start != ' '){
                $date1 = Carbon::createFromFormat($format, $start);
                $interval = $date1->diffForHumans();

                return $interval;
            }
        }
    }
}

if( ! function_exists('date_interval') )
{
    function date_interval($start)
    {
        $day = Carbon::parse($start)->diffInDays();
        
        return $day;
    }
}

if( ! function_exists('two_date_interval') )
{
    function two_date_interval($start, $end)
    {
        $end = Carbon::parse($end);
        $day = Carbon::parse($start)->diffInDays($end);
        
        return $day;
    }
}

if ( ! function_exists('diffDates') )
{
    function diffDates($start, $end=null)
    {
        if($end){
            $end = Carbon::parse($end);
        }else{
            $end = Carbon::parse($start);
        }
        $dates[] = $start;
        //$now = Carbon::now()->addMonth();

        $dt = Carbon::parse($start);
        $total_day = $dt->diffInDays($end);
        for($m=1; $m<=$total_day; $m++){
            $dates[] = $dt->addDay()->toDateString();
        }

        return $dates;
    }
}

if ( ! function_exists('addDays') )
{
    function addDays($date, $count)
    {
        return Carbon::parse($date)->addDay($count)->toDateString();
    }
}

if( ! function_exists('breadcrumb') )
{
    function breadcrumb($base=null, $child=null)
    {
        $breadcrumb = [];

        $lists = array_where(request()->segments(), function($key, $value) use($base){
            return $key != $base && !is_numeric($key);
        });

        //$link = '<li><a href="%s">%s</a></li>';
        $active_caption = 'active';

        $link   = '<li class="breadcrumb-item"><a>%s</a></li>';
        $active = '<li class="breadcrumb-item active"><strong>%s</strong></li>';
        $html   = '';

        if($child){
            if(is_array($child)){
                $breadcrumb = array_merge($lists, $child);
            }
            elseif(!is_array($child)){
                $breadcrumb = array_merge($lists, [$child]);
            }
        }
        else{
            $breadcrumb = array_values($lists);
        }

        if(in_array('sub', $breadcrumb)){
            $breadcrumb = array_diff($breadcrumb, ['sub']);
        }

        foreach(array_values($breadcrumb) as $index => $item){
            if(count($breadcrumb) == $index+1)
            {
                $html .= sprintf($active, ucfirst($item));
            }else{
                //$html .= sprintf($link, url($item), ucfirst($item));
                $html .= sprintf($link, ucfirst($item));
            }
        }

        return $html;

    }
}

if( ! function_exists('additional') )
{
    function additional($param = null)
    {
        $link = '';
        if(is_array($param)){
            if(count($param)){
                foreach($param as $item){
                    $link .= '<li>'.$item.'</li>';
                }
                return $link;
            }
        }else{
            if($param){
                $link = '<li>%s</li>';
                return sprintf($link, $param);
            }
        }
    }
}

if( ! function_exists('active_menu') )
{
    function active_menu($pattern)
    {
        return request()->is($pattern) ? 'active' : '';
    }
}

if( ! function_exists('active_mobile_menu') )
{
    function active_mobile_menu($pattern)
    {
        return request()->is($pattern) ? 'text-custom' : '';
    }
}

if( ! function_exists('in_menu') )
{
    function in_menu($pattern)
    {
        return request()->is($pattern) ? 'in' : '';
    }
}

if( ! function_exists('setting') )
{
    function setting($key = '*', $cache=true)
    {
        if( ! $cache ) Cache::forget('setting.' . $key);
        $expiresAt = Carbon::now()->addMinutes(30);
        if($key === '*'){
            return Cache::get('setting.'.$key, function() use($key, $expiresAt){
                $result = Setting::lists('value', 'key');
                Cache::put($key, $result, $expiresAt);
                return $result;
            });
        }else{
            return Cache::get('setting.'.$key, function() use($key, $expiresAt){
                $result = Setting::where('key', $key)->pluck('value');
                Cache::put($key, $result, $expiresAt);
                return $result;
            });
        }
    }
}

if( ! function_exists('show_bs_message') )
{
    function show_bs_message($messages, $type='info', $icon_position='left'){

        if(empty($messages)){
            return null;
        }

        if( isset($messages['text']) && isset($messages['type']) )
        {
            $type     = $messages['type'];
            $messages = $messages['text'];
        }

        if(is_array($messages)){
            $messages = implode('<br>', $messages);
        }

        $template = '<div class="alert alert-%s alert-icon-'.$icon_position.' alert-dismissible fade in mb-2">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        %s 
                    </div>';
        return sprintf($template, $type, $messages);
    }
}

if( ! function_exists('flash_message') )
{
    function flash_message($session, $type='info', $icon='', $messages='', $close=true)
    {
        $button = ($close) ? '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' : '';
        $icon = ($icon != '') ? fa($icon).'&nbsp; ' : '';

        session()->flash($session, '<div class="alert alert-dismissible alert-'.$type.'">
                                        '.$icon.' '.$messages.' '.$button.'
                                    </div>');
    }
}

if( ! function_exists('show_inline_error') )
{
    function show_inline_error($errors, $key){
        $wrap = '<span class="help-block">%s %s</span>';
        if($errors->has($key)){
            return sprintf($wrap, fa('times-circle'), implode($errors->get($key)));
        }
    }
}

if( ! function_exists('has_error') )
{
    function has_error($errors, $key){
        if($errors->has($key)){
            return ' has-danger ';
        }
    }
}

if( ! function_exists('render_menu_child'))
{
    function render_menu_child($menu, $toggle=true, $level3=null){
        if($toggle){
            $template = 
            '<li class="drop"><a class="custom_%s"  href="%s">%s</a>
                <ul class="dropdown features-dropdown">
                    %s
                </ul>
            </li>';
        }else{
            $template = 
            '<li class="drop"><a class="%s" href="%s">%s</a>
                <ul class="dropdown level2">
                    %s
                </ul>
            </li>';
        }

        $child = '';
        $temp = '<li><a href="%s">%s</a></li>';
        foreach($menu->child as $item){
            if(count($item->child)){
                $child .= render_menu_child($item, false);
            }else{
                $child .= sprintf($temp, $item->url, $item->display_name);
            }
        }

        $html = sprintf($template, $menu->id, $menu->url ?: '#', $menu->display_name, $child);
        // $html = sprintf($template, active_menu($menu->url), $menu->url ?: '#', $menu->display_name, $child);

        return $html;
    }
}

if( ! function_exists('action_color') )
{
    function action_color($action)
    {
        $text = '';
        switch ($action) {
            case 'create': 
                $text = 'blue'; break;
            case 'add': 
                $text = 'blue'; break;
            case 'update': 
                $text = 'green'; break;
            case 'cancel': 
                $text = 'warning'; break;
            case 'reuse': 
                $text = 'muted'; break;
            case 'delete': 
                $text = 'danger';  break;
            case 'change': 
                $text = 'brown'; break;
            case 'restore': 
                $text = 'info'; break;
            case 'login': 
                $text = 'teal'; break;
            case 'logout': 
                $text = 'purple'; break;
        }

        return $text;
    }
}

if( ! function_exists('status_color') )
{
    function status_color($action)
    {
        $text = '';
        switch ($action) {
            case 0: 
                $text = 'primary'; break;
            case 1: 
                $text = 'success'; break;
            case 2: 
                $text = 'danger'; break;
        }

        return $text;
    }
}

if ( ! function_exists('number_format_short') )
{
    function number_format_short( $n, $precision = 1 ) 
    {
        if ($n < 900) {
            // 0 - 900
            $n_format = number_format($n, $precision);
            $suffix = '';
        } else if ($n < 900000) {
            // 0.9k-850rb
            $n_format = number_format($n / 1000, $precision);
            $suffix = 'rb';
        } else if ($n < 900000000) {
            // 0.9m-850jt
            $n_format = number_format($n / 1000000, $precision);
            $suffix = 'jt';
        } else if ($n < 900000000000) {
            // 0.9b-850M
            $n_format = number_format($n / 1000000000, $precision);
            $suffix = 'M';
        } else {
            // 0.9T+
            $n_format = number_format($n / 1000000000000, $precision);
            $suffix = 'T';
        }
      // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
      // Intentionally does not affect partials, eg "1.50" -> "1.50"
        if ( $precision > 0 ) {
            $dotzero = '.' . str_repeat( '0', $precision );
            $n_format = str_replace( $dotzero, '', $n_format );
        }
        return $n_format . $suffix;
    }
}

if ( ! function_exists('order_id') )
{
    function order_id($id, $full=false)
    {
        if($full){
            return str_pad($id, 3, "0", STR_PAD_LEFT).'/'.romanic_number(date('n')).'/SK-RMC/'.date('y');
        }else{
            return '#'.str_pad($id, 5, "0", STR_PAD_LEFT);
        }
    }
}

if ( ! function_exists('email_id') )
{
    function email_id($id)
    {
        return '#'.str_pad($id, 4, "0", STR_PAD_LEFT);
    }
}

if ( ! function_exists('project_id') )
{
    function project_id($id, $separator='#')
    {
        return $separator.str_pad($id, 4, "0", STR_PAD_LEFT);
    }
}

if ( ! function_exists('do_number') )
{
    function do_number($id)
    {
        return str_pad($id, 5, "0", STR_PAD_LEFT);
    }
}

if ( ! function_exists('invoice_id') )
{
    function invoice_id($id)
    {
        return str_pad($id, 3, "0", STR_PAD_LEFT).'/'.romanic_number(date('n')).'/INV/'.date('y');
    }
}

if ( ! function_exists('material_id') )
{
    function material_id($id)
    {
        return str_pad($id, 4, "0", STR_PAD_LEFT).'/'.romanic_number(date('n')).'/KN/'.date('y');
    }
}

if ( ! function_exists('sparepart_id') )
{
    function sparepart_id($id)
    {
        return 'PO-'.str_pad($id, 4, "0", STR_PAD_LEFT).'-'.date('y');
    }
}

if ( ! function_exists('currentNumber') )
{
    function currentNumber($key, $year)
    {
        $number = Setting::key($key)->first()->value;
        $yearSetting = Setting::key($year)->first()->value;
        if($yearSetting == date('Y')){
            $number = $number + 1;

            $setting        = Setting::key($key)->first();
            $setting->value = $number;
            $setting->save();
        }else{
            $number = 1;

            $setting        = Setting::key($key)->first();
            $setting->value = $number;
            $setting->save();

            $setting_year        = Setting::key($year)->first();
            $setting_year->value = date('Y');
            $setting_year->save();
        }

        return $number; 
    }
}


if ( ! function_exists('int_random') )
{
    function int_random($length)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if ( ! function_exists('generateEAN') )
{
    function generateEAN($number)
    {
        $code = str_pad($number, 9, '0');
        $weightflag = true;
        $sum = 0;
        // Weight for a digit in the checksum is 3, 1, 3.. starting from the last digit. 
        // loop backwards to make the loop length-agnostic. The same basic functionality 
        // will work for codes of different lengths.
        for ($i = strlen($code) - 1; $i >= 0; $i--)
        {
            $sum += (int)$code[$i] * ($weightflag?3:1);
            $weightflag = !$weightflag;
        }
        $code .= (10 - ($sum % 10)) % 10;

        if(substr($code, 0, 1) == "0"){
            return generateEAN(int_random(12));
        }

        return $code;
    }
}


if ( ! function_exists('formatBytes') )
{
    function formatBytes($size, $precision = 2) 
    { 
        $base = log($size, 1024);
        $suffixes = array('Bytes', 'KB', 'MB', 'GB', 'TB');   

        return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
    } 
}

if ( ! function_exists('kgToTon') )
{
    function kgToTon($param)
    {
        $ton = 0;
        $ton = $param / 1000;

        return $ton;
    }
}

if ( ! function_exists('check_connection') )
{
    function check_connection()
    {
        $sock = @fsockopen('www.google.com', 80);
        if($sock){
            return true;
        }else{
            return false;
        }
    }
}

if ( ! function_exists('getLocation') )
{
    function getLocation($ip, $where=null)
    {
        $offline = ['ip' => '127.0.0.1', 'hostname' => 'localhost'];
        
        if(check_connection()){
            $details = json_decode(file_get_contents("http://ipinfo.io/".$ip));

            if($where){
                return $details->{$where};
            }else{
                return json_encode($details);
            }
        }else{
            return json_encode($offline);
        }

        /*
        $ curl ipinfo.io/8.8.8.8
        {
          "ip": "8.8.8.8",
          "hostname": "google-public-dns-a.google.com",
          "loc": "37.385999999999996,-122.0838",
          "org": "AS15169 Google Inc.",
          "city": "Mountain View",
          "region": "CA",
          "country": "US",
          "phone": 650
        }
        */
    }
}

if ( ! function_exists('formatSizeUnits') )
{
    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}

if ( ! function_exists('romanic_number') )
{
    function romanic_number($integer, $upcase = true) 
    { 
        $table = [
                    'M'  => 1000, 
                    'CM' => 900, 
                    'D'  => 500, 
                    'CD' => 400, 
                    'C'  => 100, 
                    'XC' => 90, 
                    'L'  => 50, 
                    'XL' => 40, 
                    'X'  => 10, 
                    'IX' => 9, 
                    'V'  => 5, 
                    'IV' => 4, 
                    'I'  => 1
                 ]; 

        $return = ''; 
        while($integer > 0) 
        { 
            foreach($table as $rom=>$arb) 
            { 
                if($integer >= $arb) 
                { 
                    $integer -= $arb; 
                    $return .= $rom; 
                    break; 
                } 
            } 
        } 

        return $return; 
    } 
}

if ( ! function_exists('array_search_by_key') )
{
    function array_search_by_key($keys, $array, $display_key = false)
    {
        $results = [];

        if(is_array($keys)){
            foreach($keys as $key){
                if (in_array($key, array_keys($array))) {
                    if($display_key){
                        $results[] = $key;
                    }else{
                        $results[] = $array[$key];
                    }
                }
            }
        }
        else{
            if(in_array($keys, array_keys($array))) {
                if($display_key){
                    $results[] = $keys;
                }else{
                    $results[] = $array[$keys];
                }
            }
        }

        return $results;
    }
}