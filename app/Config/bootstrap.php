<?php
if (defined('SITE_DIR') && file_exists(ROOT.DS.SITE_DIR.DS.'Config'.DS.'bootstrap.php')) {
	require_once(ROOT.DS.SITE_DIR.DS.'Config'.DS.'bootstrap.php');
} else {
	
	/**
	 * Default bootstrap.php file from here down.
	 */
	
	require_once(ROOT.DS.APP_DIR.DS.'Config'.DS.'global.php');
	
	/**
	 * The settings below can be used to set additional paths to models, views and controllers.
	 * This is related to Ticket #470 (https://trac.cakephp.org/ticket/470)
	 *
	 */
	
	if (!defined('SITE_DIR')) {
		define('SITE_DIR', null);
	}
	if (!defined('CONFIGS')) {
		define('CONFIGS', null);
	}

	Configure::write('Dispatcher.filters', array(
	    'ZuhaAssetDispatcher',
	    'CacheDispatcher'
	));
	
	// Add logging configuration.
	CakeLog::config('debug', array(
	    'engine' => 'FileLog',
	    'types' => array('notice', 'info', 'debug'),
	    'file' => 'debug',
	));
	CakeLog::config('error', array(
	    'engine' => 'FileLog',
	    'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	    'file' => 'error',
	));
	// Cache::config('default', array(
	 	// 'engine' => 'Apc', //[required]
	 	// 'duration'=> 3600, //[optional]
	 	// 'probability'=> 100, //[optional]
	 	// 'prefix' => Inflector::slug(SITE_DIR) . '_', //[optional]  prefix every cache file with this string
	// ));
	
	App::build(array(
		'Plugin' => array(
			ROOT.DS.SITE_DIR.DS.'Plugin'.DS,
			ROOT.DS.APP_DIR.DS.'Plugin'.DS
			),
		'Model' =>  array(
			//ROOT.DS.SITE_DIR.DS.'Locale'.DS.Configure::read('Config.language').DS.'Plugin'.DS.'%s'.DS.'Model'.DS,
			ROOT.DS.SITE_DIR.DS.'Locale'.DS.'Plugin'.DS.'%s'.DS.'Model'.DS,
			ROOT.DS.SITE_DIR.DS.'Locale'.DS.'Model'.DS,
			ROOT.DS.APP_DIR.DS.'Model'.DS
			),
		'View' => array(
			//ROOT.DS.SITE_DIR.DS.'Locale'.DS.Configure::read('Config.language').DS.'Plugin'.DS.'%s'.DS.'View'.DS,
			ROOT.DS.SITE_DIR.DS.'Locale'.DS.'Plugin'.DS.'%s'.DS.'View'.DS,
			ROOT.DS.SITE_DIR.DS.'View'.DS.'locale'.DS.Configure::read('Config.language').DS, // to be deprecated soon, 2012-11-29 RK
			ROOT.DS.SITE_DIR.DS.'Locale'.DS.'View'.DS,
			ROOT.DS.APP_DIR.DS.'View'.DS,
			),
		'Controller' => array(
			//ROOT.DS.SITE_DIR.DS.'Locale'.DS.Configure::read('Config.language').DS.'Plugin'.DS.'%s'.DS.'Controller'.DS,
			ROOT.DS.SITE_DIR.DS.'Locale'.DS.'Plugin'.DS.'%s'.DS.'Controller'.DS,
			ROOT.DS.SITE_DIR.DS.'Locale'.DS.'Controller'.DS,
			ROOT.DS.APP_DIR.DS.'Controller'.DS
			),
		'Model/Datasource' => array(
			//ROOT.DS.SITE_DIR.DS.'Locale'.DS.Configure::read('Config.language').DS.'Plugin'.DS.'%s'.DS.'Datasource'.DS,
			ROOT.DS.SITE_DIR.DS.'Locale'.DS.'Plugin'.DS.'%s'.DS.'Datasource'.DS,
			ROOT.DS.SITE_DIR.DS.'Locale'.DS.'Datasource'.DS,
			ROOT.DS.APP_DIR.DS.'Model'.DS.'Datasource'.DS
			),
		'Model/Behavior' => array(
			//ROOT.DS.SITE_DIR.DS.'Locale'.DS.Configure::read('Config.language').DS.'Plugin'.DS.'%s'.DS.'Model'.DS.'Behavior'.DS,
			ROOT.DS.SITE_DIR.DS.'Locale'.DS.'Plugin'.DS.'%s'.DS.'Model'.DS.'Behavior'.DS,
			ROOT.DS.SITE_DIR.DS.'Locale'.DS.'Model'.DS.'Behavior',
			ROOT.DS.APP_DIR.DS.'Model'.DS.'Behavior'.DS
			),
		'Controller/Component' => array(
			//ROOT.DS.SITE_DIR.DS.'Locale'.DS.Configure::read('Config.language').DS.'Plugin'.DS.'%s'.DS.'Controller'.DS.'Component'.DS,
			ROOT.DS.SITE_DIR.DS.'Locale'.DS.'Plugin'.DS.'%s'.DS.'Controller'.DS.'Component'.DS,
			ROOT.DS.SITE_DIR.DS.'Locale'.DS.'Controller'.DS.'Component',
			ROOT.DS.APP_DIR.DS.'Controller'.DS.'Component'.DS
			),
		'View/Helper' => array(
			//ROOT.DS.SITE_DIR.DS.'Locale'.DS.Configure::read('Config.language').DS.'Plugin'.DS.'%s'.DS.'View'.DS.'Helper'.DS,
			ROOT.DS.SITE_DIR.DS.'Locale'.DS.'Plugin'.DS.'%s'.DS.'View'.DS.'Helper'.DS,
			ROOT.DS.SITE_DIR.DS.'Locale'.DS.'View'.DS.'Helper',
			ROOT.DS.APP_DIR.DS.'View'.DS.'Helper'.DS
			),
	));
	/**
	 * The settings below can be used to set additional paths to models, views and controllers.
	 *
	 * App::build(array(
	 *     'Model'                     => array('/path/to/models/', '/next/path/to/models/'),
	 *     'Model/Behavior'            => array('/path/to/behaviors/', '/next/path/to/behaviors/'),
	 *     'Model/Datasource'          => array('/path/to/datasources/', '/next/path/to/datasources/'),
	 *     'Model/Datasource/Database' => array('/path/to/databases/', '/next/path/to/database/'),
	 *     'Model/Datasource/Session'  => array('/path/to/sessions/', '/next/path/to/sessions/'),
	 *     'Controller'                => array('/path/to/controllers/', '/next/path/to/controllers/'),
	 *     'Controller/Component'      => array('/path/to/components/', '/next/path/to/components/'),
	 *     'Controller/Component/Auth' => array('/path/to/auths/', '/next/path/to/auths/'),
	 *     'Controller/Component/Acl'  => array('/path/to/acls/', '/next/path/to/acls/'),
	 *     'View'                      => array('/path/to/views/', '/next/path/to/views/'),
	 *     'View/Helper'               => array('/path/to/helpers/', '/next/path/to/helpers/'),
	 *     'Console'                   => array('/path/to/consoles/', '/next/path/to/consoles/'),
	 *     'Console/Command'           => array('/path/to/commands/', '/next/path/to/commands/'),
	 *     'Console/Command/Task'      => array('/path/to/tasks/', '/next/path/to/tasks/'),
	 *     'Lib'                       => array('/path/to/libs/', '/next/path/to/libs/'),
	 *     'Locale'                    => array('/path/to/locales/', '/next/path/to/locales/'),
	 *     'Vendor'                    => array('/path/to/vendors/', '/next/path/to/vendors/'),
	 *     'Plugin'                    => array('/path/to/plugins/', '/next/path/to/plugins/'),
	 * ));
	 *
	 */
	
    Inflector::rules('singular', array('irregular' => array('webpage_jses' => 'webpage_js')));
    Inflector::rules('plural', array('irregular' => array('webpage_js' => 'webpage_jses')));
	
	/**
	 * reads settings.ini (or defaults.ini if non-existent)
	 * and sets configurable constants that are set in the settings db table
	 */
	function __setConstants($path = null, $return = false) {
		$path = (!empty($path) ? $path : CONFIGS);
		if (file_exists($path .'defaults.ini')) {
			if (file_exists($path .'settings.ini')) {
				$path .= 'settings.ini';
			} else {
				$path .= 'defaults.ini';
			}
			$settings = parse_ini_file($path, true);
			if ($return == true) {
				$settings = ZuhaSet::array_map_r($settings, 'ZuhaSet::parse_ini_r');
				return $settings;
			} else {
				foreach ($settings as $key => $value) {
					$key = trim($key);
					if (!defined(strtoupper($key))) {
						if (is_array($value)) {
							define(strtoupper($key), serialize($value));
						} else {
							define(strtoupper($key), $value);
						}
					}
				}
			}
		} else if (defined(SITE_DIR)) {
			debug('A defaults.ini file is required here : ' . $path . 'defaults.ini');
			break;
		}
	}
	
	__setConstants();
	
	/**
	 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
	 * Uncomment one of the lines below, as you need. make sure you read the documentation on CakePlugin to use more
	 * advanced ways of loading plugins
	 *
	 */
        //debug(SITE_DIR);break;
	if (defined('__SYSTEM_LOAD_PLUGINS')) {
		//CakePlugin::loadAll();
		extract(unserialize(__SYSTEM_LOAD_PLUGINS));
		CakePlugin::load($plugins);
	} elseif (SITE_DIR === NULL){
    	CakePlugin::loadAll(); // Loads all plugins at once
    } else {
    	CakePlugin::load(array('Contacts', 'Galleries', 'Privileges', 'Users', 'Webpages', 'Utils')); // required plugins    
	}
	
	function templateSettings() {
		$settings = unserialize(__APP_TEMPLATES);
		$i = 0;
		if (!empty($settings['template'])) {
			foreach ($settings['template'] as $setting) {
				$templates[$i] = unserialize(gzuncompress(base64_decode($setting)));
				$templates[$i]['userRoles'] = unserialize($templates[$i]['userRoles']);
				$templates[$i]['urls'] = empty($templates[$i]['urls']) || $templates[$i]['urls'] == '""'  ? null : unserialize(gzuncompress(base64_decode($templates[$i]['urls'])));
				$i++;
			}
		}
		return $templates;
	}
	
	
	/**
	 * temporary convenience function for states options
	 *
	 * @todo 	delete this all together after making it db based in enumerations (but give default values)
	 */
	function states() {
		return array(
			'AL' => 'Alabama',
			'AK' => 'Alaska',
			'AZ' => 'Arizona',
			'AR' => 'Arkansas',
			'CA' => 'California',
			'CO' => 'Colorado',
			'CT' => 'Connecticut',
			'DE' => 'Delaware',
			'FL' => 'Florida',
			'GA' => 'Georgia',
			'HI' => 'Hawaii',
			'ID' => 'Idaho',
			'IL' => 'Illinois',
			'IN' => 'Indiana',
			'IA' => 'Iowa',
			'KS' => 'Kansas',
			'KY' => 'Kentucky',
			'LA' => 'Louisiana',
			'ME' => 'Maine',
			'MD' => 'Maryland',
			'MA' => 'Massachusetts',
			'MI' => 'Michigan',
			'MN' => 'Minnesota',
			'MS' => 'Mississippi',
			'MO' => 'Missouri',
			'MT' => 'Montana',
			'NE' => 'Nebraska',
			'NV' => 'Nevada',
			'NH' => 'New Hampshire',
			'NJ' => 'New Jersey',
			'NM' => 'New Mexico',
			'NY' => 'New York',
			'NC' => 'North Carolina',
			'ND' => 'North Dakota',
			'OH' => 'Ohio',
			'OK' => 'Oklahoma',
			'OR' => 'Oregon',
			'PA' => 'Pennsylvania',
			'RI' => 'Rhode Island',
			'SC' => 'South Carolina',
			'SD' => 'South Dakota',
			'TN' => 'Tennessee',
			'TX' => 'Texas',
			'UT' => 'Utah',
			'VT' => 'Vermont',
			'VA' => 'Virginia',
			'WA' => 'Washington',
			'WV' => 'West Virginia',
			'WI' => 'Wisconsin',
			'WY' => 'Wyoming',
			);
	}
	
	
	/**
	 * To add to the core cake utility Inflector
	 */
	class ZuhaInflector {
    
	    /**
	     * String to ASCII
	     * Converts the given string to a no spaces, no special characters, no cases string, like a url
	     * 
	     * Tänk efter nu – förr'n vi föser dig bort BECOMES tank-efter-nu-forrn-vi-foser-dig-bort
		 * 
		 * Usage : ZuhaInflector::asciify('some string');
	     * 
	     * @param string $str
	     * @param array $replace
	     * @param string $delimiter
	     * @return string
	     */
        public function asciify($str, $replace = array(), $delimiter = '-') {
            if(!empty($replace)) {
            	$str = str_replace((array)$replace, ' ', $str);
        	}
        
        	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        	$clean = strtolower(trim($clean, '-'));
        	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
        
        	return $clean;
        }
    
	    /**
	     * String to Url
	     * Converts the given string to a no spaces, no special characters, no cases string, like a url. 
		 * Unlike the asciify function it changes + (plus signs) to / (slashes)
	     * 
	     * Tänk efter nu – förr'n vi föser dig b+ort BECOMES tank-efter-nu-forrn-vi-foser-dig-b/ort
		 * 
		 * Usage : ZuhaInflector::urlify('some string');
	     * 
	     * @param string $str
	     * @param array $replace
	     * @param string $delimiter
	     * @return string
	     */
        public function urlify($str, $delimiter = '-') {
        	$strs = explode('+', $str);
			$string = '';
			for ($i = 0; $i < count($strs); $i++) {
				$parts[] = ZuhaInflector::asciify(trim($strs[$i]));
			}        
        	return implode('/', $parts);
        }
		
		/**
		 * Flatten a multidimensional array to a single string
		 * 
		 * @param array $array
		 * @param array $options
		 */
		public function flatten($array = array(), $options = array('separator' => ',')) {
			$json  = json_encode($array); // converts an object to an array
			$array = json_decode($json, true);
		    $return = array();
		    @array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
		    return implode($options['separator'], $return);
		}
	
		/**
		 * Function for formatting the pricing of an item.
		 *
		 * @todo 	Update to include the dollar sign, and decimal place for various languages. (and remove the dollar sign from the view files. Based on a setting that needs to be created yet.
		 */
		public function pricify($price, $options = array()) {
			$defaults['places'] = 2;
			$defaults['decimal'] = '.';
			$defaults['separator'] = ',';
			$options = array_merge($defaults, $options);
			// currency add ons
			$start = null;
			$end = null;
			if ($options['currency'] == 'USD') {
				 $start = '$';
			}
			// returns
			if ($price === null) {
				return null;
			} elseif ($price > 999999) {
				$price = substr(round($price, -4), 0, -4);
				return $start . substr($price, 0, -2) . '.' . substr($price, -2) . 'm' . $end;
			} elseif ($price > 9999) {
				return $start . substr(round($price, -3), 0, -3) . 'k' . $end;
			} else {
				return $start . number_format($price, $options['places'], $options['decimal'], $options['separator']) . $end;
			}
		}
	
		/**
		 * Function for formatting the pricing of an item.
		 *
		 * @todo 	Update to include the dollar sign, and decimal place for various languages. (and remove the dollar sign from the view files. Based on a setting that needs to be created yet.
		 */
		public function datify($date) {
			if($date === NULL) {
				return NULL;
			} else {
				return date('M j, Y', strtotime($date));
			}
		}
	
		/**
		 * Function for formatting dates (yes I know about the Time helper, and I don't like it.
		 * But mainly this will alos allow a default time format on a per site need (using a setting).
		 *
		 * @todo	Have options for the time, like timeAgo and/or date format string.
		 */
		public function dateize($date, $options = null) {
			return date('M j, Y', strtotime($date));
		}
	
	
		/**
		 * return a plugin name from a controller name
		 *
		 * @todo There must be a better way...
		 */
		public static function pluginize($name) {
            // if you put something like this here, comment as to why
            //if($name == "1s") { debug(debug_backtrace()); }
            
			// list of models and controllers to rename to the corresponding plugin
			$name = Inflector::singularize(Inflector::camelize($name));
			
			$allowed = array(
				'Aco' => false,
				'Activity' => 'Activities',
				'AffiliateEarning' => 'Affiliates',
				'Affiliated' => 'Affiliates',
				'Affiliate' => 'Affiliates',
				'Alias' => false,
				'Answer' => 'Answers',
				'AnswerAnswer' => 'Answers',
				'AnswerSubmission' => 'Answers',
				'AnswerStep' => 'Answers',
				'Aro' => false,
				'ArosAco' => false,
				'Auction' => 'Auctions',
				'AuctionBid' => 'Auctions',
				'Banner' => 'Banners',
				'BannerView' => 'Banners',
				'BannerPosition' => 'Banners',
				'BlogPost' => 'Blogs',
				'Blog' => 'Blogs',
				'CatalogItemBrand' => 'Catalogs',
				'CatalogItemPrice' => 'Catalogs',
				'CatalogItem' => 'Catalogs',
				'CatalogItemsRelationship' => 'Catalogs',
				'Catalog' => 'Catalogs',
				'Category' => 'Categories',
				'Categorized' => 'Categories',
				'CategorizedOption' => 'Categories',
				'CategoryOption' => 'Categories',
				'Canvas' => 'Media',
				'Canva' => 'Media',
				'Chat' => 'Chats',
				'Classified' => 'Classifieds',
				'Comment' => 'Comments',
				'Condition' => false,
				'Connection' => 'Connections',
				'ConnectionPaypal' => 'Connections',
				'ContactAddress' => 'Contacts',
				'ContactDetail' => 'Contacts',
				'Contact' => 'Contacts',
				'ContactsContact' => 'Contacts',
				'Course' => 'Courses',
				'CourseUser' => 'Courses',
				'CourseGradeAnswer' => 'Courses',
				'CourseGrade' => 'Courses',
				'CourseGradeDetail' => 'Courses',
				'CourseLesson' => 'Courses',
				'CourseSchool' => 'Courses',
				'CourseSeries' => 'Courses',
				'Coupon' => 'Coupons',
				'Credit' => 'Credits',
				'Draft' => 'Drafts',
				'Educast' => 'Educasts',
				'Enumeration' => false,
				'EstimateItem' => 'Estimates',
				'Estimated' => 'Estimates',
				'Estimate' => 'Estimates',	
				'EventSchedule' => 'Events',
				'EventSeat' => 'Events',
				'EventVenue' => 'Events',
				'Event' => 'Events',
				'EventsGuest' => 'Events',
				'Facebook' => 'Facebook',
				'Favorite' => 'Favorites',
				'Faq' => 'Faqs',
				'Favorite' => 'Favorites',
				'FeedCj' => 'Feeds',
				'FeedAmazon' => 'Feeds',
				'Feed' => 'Feeds',
				'FormAnswer' => 'Forms',
				'FormFieldset' => 'Forms',
				'FormInput' => 'Forms',
				'FormKey' => 'Forms',		
				'Form' => 'Forms',	
				'Forum' => 'Forums',
				'ForumPost' => 'Forums',	
				'Gallery' => 'Galleries',
				'GalleryImage' => 'Galleries',
				'Invite' => 'Invites',
				'InvoiceItem' => 'Invoices',
				'InvoiceTime' => 'Invoices',
				'Invoice' => 'Invoices',
				'Location' => 'Locations',
				'Map' => 'Maps',
				'Media' => 'Media',
				'MediaAttachment' => 'Media',
				'MediaGallery' => 'Media',
				'Menu' => 'Menus',
				'Message' => 'Messages',
				'Meta' => false,
				'Metum' => false,
				'News' => 'News',
				'NotificationTemplate' => 'Notifications',
				'Notification' => 'Notifications',
				'Option' => 'Products',
				'Phonebook' => 'Phonebooks',
				'PhonebookService' => 'Phonebooks',
				'PhonebooksService' => 'Phonebooks',
                'Privilege' => 'Privileges',
                'ProductBrand' => 'Products',
                'ProductPrice' => 'Products',
                'ProductsOption' => 'Products',
                'ProductsProductOption' => 'Products',
                'ProductStore' => 'Products',
                'Product' => 'Products',
                'Property' => 'Properties',
                'Job' => 'Jobs',
                'JobResume' => 'Jobs',
				'ProjectIssue' => 'Projects',
				'Project' => 'Projects',
				'ProjectsMember' => 'Projects',
				'ProjectsWatcher' => 'Projects',
				'ProjectsWiki' => 'Projects',
				'Rating' => 'Ratings',
				'Record' => 'Records',
				'Report' => 'Reports',
				'ReportData' => 'Reports',
				'ReportPage' => 'Reports',
				'ReportSalaryCalculatorData' => 'Reports',
                'Requestor' => 'Privileges',
				'Searchable' => 'Searchable',
                'Section' => 'Privileges',
				'Setting' => false,
				'Subscriber' => 'Subscribers',
				'SubscriberMail' => 'Subscribers',
				'Tagged' => 'Tags',
				'Tag' => 'Tags',
				'Task' => 'Tasks',
				'TaskAttachment' => 'Tasks',
				'Template' => false,
				'TicketDepartmentsAssignee' => 'Tickets',
				'Ticket' => 'Tickets',
				'TimesheetTime' => 'Timesheets',
				'Timesheet' => 'Timesheets',
				'TimesheetsTimesheetTime' => 'Timesheets',
				'Transaction' => 'Transactions',
				'TransactionAddress' => 'Transactions',
				'TransactionCoupon' => 'Transactions',
				'TransactionItem' => 'Transactions',
				'TransactionPayment' => 'Transactions',
				'TransactionShipment' => 'Transactions',
    			'TransactionTax' => 'Transactions',
				'Twitter' => 'Twitter',
				'UpdateSchema' => false,				
				'Used' => 'Users',
				'UserConnect' => 'Users',
				'UserFollower' => 'Users',
				'UserGroupWallPost' => 'Users',
				'UserGroup' => 'Users',
				'UserRole' => 'Users',
				'UserStatus' => 'Users',
				'UserWall' => 'Users',
				'User' => 'Users',
				'UsersUserGroup' => 'Users',
				'UserMeasurement' => 'Users',
				'Util' => 'Utils',
				'Utils' => 'Utils',
				'WebpageCss' => 'Webpages',
				'WebpageMenu' => 'Webpages',
				'WebpageMenuItem' => 'Webpages',
				'WebpageJ' => 'Webpages',
				'WebpageJse' => 'Webpages',
				'Webpage' => 'Webpages',
				'WebpageReport' => 'Webpages',
				'WikiContentVersion' => 'Wikis',
				'WikiContent' => 'Wikis',
				'WikiPage' => 'Wikis',
				'Wiki' => 'Wikis',
				'Wizard' => 'Wizards',
				'WorkflowEvent' => 'Workflows',
				'WorkflowItemEvent' => 'Workflows',
				'WorkflowItem' => 'Workflows',
				'Workflow' => 'Workflows',
				'Region' => false,
                'Regional' => false,
				'Question' => 'Questions',
				'QuestionAnswer' => 'Questions',
				'ZuhaSchema' => false,
				);
				
			if (!empty($name) && $allowed[$name] !== null) {
				return $allowed[$name];
			} else {
              	return Inflector::tableize($name);
			}
		}
        
        /**
         * invalidate method
         * 
         * parse the function $Model->invalidFields() into a string
         * 
         * @param type $invalidFields
         */
        public function invalidate($invalidField = array()) {
            $one = key($invalidField);
            $two = key($invalidField[$one]);
            $return = '';
            $three = is_array($invalidField[$one][$two]) ? $invalidField[$one][$two][0] : null;
            if ($three) {
                $four = Configure::read('debug') > 0 ? __('(Debugger field : %s.%s)', $one, $two) : '';
                $return .= __('%s', $three);
            } else {
                $four = Configure::read('debug') > 0 ? __('(Debugger field : CurrentModel.%s)', $one) : '';
                $return .= __('%s', $invalidField[$one][0]);
            }
            
            return __('%s %s', $return, $four);
        }
		
		/**
		 * numerate method
		 * 
		 * take a string and return just the numbers in it
		 * 
		 * @param string
		 */
		 public function numerate($string) {
		 	return preg_replace("/[^0-9]/","",$string);;
		 }
        
	} // end ZuhaInflector class

} // end bootstrap overwrite check
