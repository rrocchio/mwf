<?php

/**
 *
 * @package mwf
 *
 * @author ebollens
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20110519
 *
 * @uses Decorator
 * @uses Site_Decorator
 * @uses HTML_Decorator
 * @uses HTML_Start_HTML_Decorator
 * @uses Head_Site_Decorator
 * @uses Body_Start_HTML_Decorator
 * @uses Header_Site_Decorator
 * @uses Content_Full_Site_Decorator
 * @uses Button_Full_Site_Decorator
 * @uses Default_Footer_Site_Decorator
 * @uses Body_End_HTML_Decorator
 * @uses HTML_End_HTML_Decorator
 */

require_once(dirname(dirname(__FILE__)).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(__FILE__)).'/assets/config.php');

$contributors = array(

                        'UC Los Angeles'=>array('Eric Bollens',
                                      'Ed Sakabu',
                                      'Mike Takahashi',
                                      'Joseph Madella',
                                      'Nate Emerson',
                                      'Zorayr Khalapyan'
                                     ),
                        'UC Berkeley'=>array('Sara Leavit'
                                     ),
                        'UC San Diego'=>array('Mojgan Amini',
                                              'Ike Lin'
                                     ),
                        'UC San Francisco'=>array('Richard Trott'
                                     )
                    );

echo HTML_Decorator::html_start();

echo Site_Decorator::head()->set_title('MWF Credits');

echo HTML_Decorator::body_start();

echo Site_Decorator::header()
        ->set_title('MWF Credits');

echo Site_Decorator::content_full()
            ->set_padded()
            ->add_header('Project')
            ->add_paragraph('<strong>Project Lead</strong><br>
                                Rose Rocchio (UCLA)<br>'
                                .HTML_Decorator::tag('a', 'rrocchio@oit.ucla.edu',
                                    array('href'=>'mailto:rrocchio@oit.ucla.edu')),
                            array('style'=>'text-align:center;'))
            ->add_paragraph('<strong>Technical Lead</strong><br>
                                Eric Bollens (UCLA)<br>'
                                .HTML_Decorator::tag('a', 'ebollens@oit.ucla.edu',
                                    array('href'=>'mailto:ebollens@oit.ucla.edu')),
                            array('style'=>'text-align:center;'))
            ->add_paragraph('<strong>Systems Lead</strong><br>
                                Ed Sakabu (UCLA)<br>'
                                .HTML_Decorator::tag('a', 'sakabu@ats.ucla.edu',
                                    array('href'=>'mailto:sakabu@ats.ucla.edu')),
                            array('style'=>'text-align:center;'));

$contributions = Site_Decorator::content_full()
                    ->set_padded()
                    ->add_header('Contributors')
                    ->add_paragraph('In addition to their own mobile applications, a number of participants have contributed code directly to the UCLA Mobile Web Framework.', array('style'=>'font-style:italic;'));

foreach($contributors as $campus=>$people)
{
    $campus_contributors = '<strong>'.$campus.'</strong><br>';
    foreach($people as $person)
        $campus_contributors .= $person . '<br>';
    $campus_contributors = substr($campus_contributors, 0, strlen($campus_contributors)-4);
    $contributions->add_paragraph($campus_contributors, array('style'=>'text-align:center;'));
}

$contributions->add_paragraph('Beyond direct contributions, the input and suggestions of numerous others have made the UCLA Mobile Web Framework possible.', array('style'=>'font-style:italic;'));

echo $contributions;

echo Site_Decorator::button_full()
                ->set_padded()
                ->add_option(Config::get('global', 'back_to_home_text'), Config::get('global', 'site_url'));

echo Site_Decorator::default_footer();

echo HTML_Decorator::body_end();

echo HTML_Decorator::html_end();
