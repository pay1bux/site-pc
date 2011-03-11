<?php 

function get_email_style($style)
{
	$email_styles = array(
	
		/**** Defaults ****/
		
		/*- Global -*/
		'template_width' => 'width="700"',
		'body_main_style' => 'style="font-family: Arial, \'Helvetica\', \'FreeSans\', \'sans-serif\'; margin: 10px; padding: 0; background-color: #ffffff;"',
		'body_email_style' => 'style="background-color: #ffffff;"',
		'link_style' => 'color: #1491e5; outline: 0;',
		
		/*- Header -*/
		'header_body_style' => 'style="background-color: #ffffff;"',
		'header_logo_style' => 'style="background-color: #ffffff; padding: 5px 10px;"',
		'header_title_style' => 'style="font-family: Arial, \'Helvetica\', \'FreeSans\', \'sans-serif\'; background-color: #39a5d1; font-size: 12px; color: #ffffff; font-weight: normal; line-height: 1em; padding: 8px 10px; margin: 0; border: 1px #2876aa solid;"',
		'header_link_style' => 'style="color: #ffffff;text-decoration: underline;"',	
	
		/*- Footer -*/
		'footer_body_style' => 'style="background-color: #cccccc; padding: 5px 10px;"',
		'footer_website_text' => 'style="font-family: Arial, \'Helvetica\', \'FreeSans\', \'sans-serif\'; color:#ffffff; font-size: 10px; margin: 0; padding: 0;"',
		'footer_website_link' => 'style="font-family: Arial, \'Helvetica\', \'FreeSans\', \'sans-serif\'; color:#ffffff;"',
		
		/**** Content Specific ****/
		/* Common */
		'content_body_style' => 'style="margin: 0; padding: 10px 0px; background-color: #ffffff;"',
		'content_title2_style' => 'style="font-family: Arial, \'Helvetica\', \'FreeSans\', \'sans-serif\'; font-size: 13px; color: #3192c7; font-weight: bold; line-height: 1em; padding: 20px 0 3px 0; border-bottom: 1px #cccccc dotted; margin: 0; text-transform: uppercase;"',
		'content_title3_style' => 'style="font-family: Arial, \'Helvetica\', \'FreeSans\', \'sans-serif\'; font-size: 11px; color: #000000; line-height: 1em;"',
		'content_text_style' => 'style="font-family: Arial, \'Helvetica\', \'FreeSans\', \'sans-serif\'; font-size: 12px; color: #000000; margin: 0 0 0px 0; padding: 0; line-height: 18px;"',
		'content_link_style' => 'style="font-family: Arial, \'Helvetica\', \'FreeSans\', \'sans-serif\'; font-size: 12px; color:#1491e5;"',
		
		/* Table */
		'data_table_th' => 'style="font-family: Arial, \'Helvetica\', \'FreeSans\', \'sans-serif\'; font-size: 12px; background: #eeeeee; border-top: 1px #d2d2d2 solid; border-left: 1px #d2d2d2 solid; border-bottom: 1px #d2d2d2 solid; color: black; text-transform: uppercase; padding: 10px; text-align: left;"',
		'data_table_th_last' => 'style="font-family: Arial, \'Helvetica\', \'FreeSans\', \'sans-serif\'; font-size: 12px; background: #eeeeee; border-top: 1px #d2d2d2 solid; border-left: 1px #d2d2d2 solid; border-bottom: 1px #d2d2d2 solid; color: black; text-transform: uppercase; padding: 10px; text-align: left; border-right: 1px #d2d2d2 solid;"',
		'data_table_td' => 'style="font-family: Arial, \'Helvetica\', \'FreeSans\', \'sans-serif\'; font-size: 12px; border-bottom: 1px #d2d2d2 solid; border-left: 1px #d2d2d2 solid; padding: 10px;"',
		'data_table_td_last' => 'style="font-family: Arial, \'Helvetica\', \'FreeSans\', \'sans-serif\'; font-size: 12px; border-bottom: 1px #d2d2d2 solid; border-left: 1px #d2d2d2 solid; padding: 10px; border-right: 1px #d2d2d2 solid;"'
	);	
	
	return $email_styles[$style];
	
}


function set_email($email_content, $vars) {
	
	$html_mail = '
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
			"http://www.w3.org/TR/html4/loose.dtd">
		<html>
		<head>
			<meta http-equiv="content-type" content="text/html; charset=utf-8">
			<title>'.$vars['subject'].'</title>
			<style type="text/css">
				a:link, a:visited {
					text-decoration: none;
					'.get_email_style('link_style').'
				}
				
				a:hover {
					text-decoration: underline;
				}
			</style>
		</head>
		
		<body '.get_email_style('body_main_style').'>
			
			<table width="100%" cellpadding="0" cellspacing="0" border="0" '.get_email_style('body_main_style').'>
				<tr>
					<td '.get_email_style('template_width').' valign="top" align="center">
						<table '.get_email_style('template_width').' border="0" cellspacing="0" cellpadding="0" '.get_email_style('body_email_style').'>
						
							<!-- content -->
							<tr>
								<td valign="top" '.get_email_style('template_width').' '.get_email_style('content_body_style').'>
									<!-- Content inserted here -->
									'.$email_content.'
									<!-- End inserted content -->
								</td>
							</tr>
							
						</table>
					</td>
				</tr>
			</table>
			
		</body>
		</html>
			';
	
	return $html_mail;
}
?>