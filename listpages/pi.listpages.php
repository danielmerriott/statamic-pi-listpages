<?php
class Plugin_listpages extends Plugin
{
    public function index()
    {
        $current_page  = $this->fetchParam('current_page', 1, 'is_numeric', false, false);
        $total_pages   = $this->fetchParam('total_pages', 1, 'is_numeric', false, false);
        $pages_to_show = $this->fetchParam('pages_to_show', 5, 'is_numeric', false, false);
        
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
            $listing .= '<a href="{{ url }}?page=' . $i . '">' . $i . '</a></li>';
        }

        return $listing;
    }
}
