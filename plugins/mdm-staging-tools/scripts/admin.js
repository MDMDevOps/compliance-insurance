jQuery( function( $ ) {
	'use strict';
	var Settings = function( $el ) {
		var $form, request, $init_button, $alerts;

		var cacheDom = function() {
			$form = {
				apikey : $el.find( 'input[id*="api_key"]' ),
				user : $el.find( 'input[id*="user"]' ),
				name : $el.find( 'input[id*="name"]' ),
				path : $el.find( 'input[id*="path"]' ),
				env  : $el.find( 'input[id*="env"]' ),
			};
			$init_button = $el.find( '#init' );
			$alerts = $el.find( '#alerts' );
		};

		var bindHandlers = function() {
			// If we have an init button
			if( $init_button.length >= 1 ) {
				// Bind handlers for enabling the button
				for( var key in $form ) {
					$form[key].on( 'keyup', enableButton );
				}
				$init_button.on( 'click', install );
			}
		};

		var install = function( event ) {
			event.preventDefault();
			var data = {
				action  : 'install',
				api_key : $form.apikey.val(),
				user    : $form.user.val(),
				name    : $form.name.val(),
				path    : $form.path.val(),
				env     : $form.env.val()
			};
			// Send Ajax Request
			request = new Request( data, function( response ) {
				$alerts.find( 'p' ).html( response.message );
			});
		};

		var enableButton = function() {
			// If we have no button, bail...
			if( $init_button.length === 0 ) {
				return false;
			}
			// Flag for whether to disable or not
			var disabled = false;
			// Loop through each form element
			for( var key in $form ) {
				if( $form[key].val() === '' ) {
					disabled = true;
				}
			}
			$init_button.attr( 'disabled', disabled );
		};

		var init = ( function() {
			// Bail right away if we aren't on the right page
			if( $el.length === 0 ) {
				return false;
			}
			cacheDom();
			bindHandlers();
			enableButton();
		})();
	}( $( '#gitsettings' ) );

	var InitForm = function() {
		// Declare variables
		var $el, $form, request;
		// Cache DOM
		$el = $( '#gitinit' );
		$form = {
			apikey : $el.find( 'input[id*="api_key"]' ),
			user : $el.find( 'input[id*="user"]' ),
			name : $el.find( 'input[id*="name"]' )
		};
		// Attach handler to each form element
		for( var key in $form ) {
		   $form[key].on( 'change', enableButton );
		}

		function validate() {
			var invalid = false;
			for( var key in $form ) {
				if( $form[key].val() === '' || $form[key].val() === null ) {
					invalid = true;
					break;
				}
			}
			return invalid;
		}
		// Bind Events
		// $el.find( '#submit' ).on( 'click', initrepo );
		// Function fired on click event of submit button
		function initrepo( event ) {
			event.preventDefault();
			var data = {
				action : 'init_repo',
				api_key : $form.apikey.val(),
				user   : $form.user.val(),
				name   : $form.user.val(),
			};
			// Make sure we have all the data we need
			if( data.apikey === '' || data.user === '' || data.name === '' ) {
				alert( 'Must have all data to proceed' );
				return false;
			}
			// If all data is present, we can continue on to make the request
			request = new Request( data, function( response ) {
				console.log( response );
			});
		}

		function getFormData() {
			return {
				user : $form.find( '#mdm_staging_tools[user]' ).val(),
				name : $form.find( '' )
			};
		}
	};

	// Define Request
	function Request( data, callback ) {
		var json, ajax;
		ajax = $.post( wpgitajax.ajaxurl, data );
		ajax.done( function( response ) {
			try {
				json = JSON.parse( response );
				return callback( json );
			} catch( error ) {
				json = {
					'status' : 'Unable to render response',
					'error'  : error,
					'data'   : null,
				};
				return callback( json );
			}
		});
	}
}); // end document ready
