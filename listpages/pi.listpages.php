<?php
class Plugin_listpages extends Plugin
{
    public function index()
    {
            $p_var         = Config::getPaginationVariable();
            $current_page  = array_get($this->context, 'current_page');
            $total_pages   = array_get($this->context, 'total_pages');
            $pages_to_show = $this->fetchParam('pages_to_show', 5, 'is_numeric', false, false);
            $q_strings     = URL::sanitize($_GET);
            
            // catch less than 1 total pages
            if ($total_pages <= 1) {
                return 0;
            }
            
            $listing = '';
            $lower = max( 1 , min( floor( $current_page - (( $pages_to_show - 1 ) / 2 ) ) , ( $total_pages - $pages_to_show + 1 ) ) );
            $upper = $lower + min( $total_pages, $pages_to_show ) - 1;

            for ($i = $lower; $i <= $upper; $i++) {
                if ( $i == $current_page ) {
                    $listing .= '<li class="active">';
                } else {
                    $listing .= '<li>';
                }
                $q = http_build_query(array_merge($q_strings, array($p_var => $i)));
                $listing .= '<a href="{{ url }}?' . $q . '">' . $i . '</a></li>';
            }

        return $listing;
    }
}
