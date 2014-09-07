<?php

/**
 *
 * Example of a Captcha Controller
 * Created by Jordane JOUFFROY
 * contact@jordane.net
 *
 * Created with VisualCaptcha
 * A library from EmotionLoop
 * http://visualcaptcha.net
 * 
 */

class CaptchaController extends BaseController {

	/**
	 * Generate a Captcha
	 * @return Response
	 */
	public function start($howmany)
	{
		$session = new SessionCaptcha();
		$captcha = new Captcha($session);
		$captcha->generate($howmany);
		return Response::json($captcha->getFrontEndData());
	}

	/**
	 * Get an audio file
	 * @param  string $type Song type (mp3/ogg)
	 * @return File
	 */
	public function audio($type = 'mp3')
	{
		$session = new SessionCaptcha();
		$captcha = new Captcha($session);
		return $captcha->streamAudio(array(), $type);
	}

	/**
	 * Get an image file
	 * @param  string $index  Image index
	 * @return File
	 */
	public function image($index)
	{
		$session = new SessionCaptcha();
		$captcha = new Captcha($session);
		return $captcha->streamImage(array(), $index, 0);
	}

	/**
	 * Check if the Captcha result is good
	 * @return Mixed
	 */
	public function send()
	{
		$session = new SessionCaptcha();
		$captcha = new Captcha($session);

	    $frontendData = $captcha->getFrontendData();

	    if ( ! $frontendData ) {
	        return Lang::get('error.captcha.none');
	    } else {
	        // If an image field name was submitted, try to validate it
	        if ( $imageAnswer = Input::get($frontendData[ 'imageFieldName' ]) ) {
	            if ( $captcha->validateImage( $imageAnswer ) ) {
	            	// Return false if the result is correct
	            	return false;
	            } else {
	                return Lang::get('error.captcha.image');
	            }
	        } else if ( $audioAnswer = Input::get($frontendData[ 'audioFieldName' ]) ) {
	            if ( $captcha->validateAudio( $audioAnswer ) ) {
	            	// Return false if the result is correct
	                return false;
	            } else {
	                return Lang::get('error.captcha.audio');
	            }
	        } else {
	           return Lang::get('error.captcha.incomplete');
	        }
	    }
	}

}
