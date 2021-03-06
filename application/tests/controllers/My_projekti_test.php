<?php
/**
 * PHPUnit tests for the main controller.
 */

/**
 * Test for the main controller.
 */
class My_projekti_test extends TestCase
{
	
	/**
	 * A valid and used MySQL ID column integer value that is present in all tables in the default database. The value is 1.
	 */
	public $valid_id_int;
	
	/**
	 * An invalid MySQL ID column integer value. The value is 0.
	 */
	public $invalid_id_int;
	
	/**
	 * A valid MySQL ID column integer value that is not used in any tables in the default database. The value is 999999.
	 */
	public $unused_id_int;
	
	/**
	 * An invalid MySQL ID column value. The value is a number followed with letters.
	 */
	public $malformed_id_string;
	
	/**
	 * Set up the common variables before tests.
	 * @author Jose
	 */
	public function setUp()
	{
		$this->invalid_id_int=0;
		$this->valid_id_int=1;
		$this->malformed_id_string="eifkgnmrit";
		$this->unused_id_int=999999;
	}
	
	/**
	 * Test for: Valid APPPATH
	 * @author Jose
	 */
	public function test_APPPATH()
	{
		$actual = realpath(APPPATH);
		$expected = realpath(__DIR__ . '/../..');
		$this->assertEquals(
			$expected,
			$actual,
			'Your APPPATH seems to be wrong. Check your $application_folder in tests/Bootstrap.php'
		);
	}
	
	/**
	 * Page Test: 404 part 1
	 * @author Jose
	 */
	public function test_404()
	{
		$this->request('GET', ['My_projekti', 'this-is-not-a-function']);
		$this->assertResponseCode(404);
	}
	
	/**
	 * Page Test: 404 part 2
	 * @author Jose
	 */
	public function test_404_2()
	{
		$this->request('GET', 'this-is-not-a-page');
		$this->assertResponseCode(404);
	}
	
	/**
	 * Page Test: front page by function
	 * @author Jose
	 */
    public function test_index_by_function()
    {
        $output = $this->request('GET', ['My_projekti', 'view']);
        $this->assertContains('<title>Virtual Bookshelf</title>', $output);
        $this->assertContains('<h1 class="first-content-element">Welcome!</h1>', $output);
    }
	
	/**
	 * Page Test: front page by uri
	 * @author Jose
	 */
	public function test_index_by_uri()
    {
        $output = $this->request('GET', '/');
        $this->assertContains('<title>Virtual Bookshelf</title>', $output);
        $this->assertContains('<h1 class="first-content-element">Welcome!</h1>', $output);
    }

	/**
	 * Page Test: booklist by uri
	 * @author Ilkka
	 */
	public function test_booklist_by_uri()
    {
        $output = $this->request('GET', 'booklist');
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains('<div id="productlist" class="list-group">', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: bookview by  NULL uri
	 * @author Ilkka
	 */
	public function test_bookview_by_null_uri()
    {
        $output = $this->request('GET', 'bookview/');
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains('Invalid book ID \'\'', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: bookview by valid uri
	 * @author Ilkka
	 */
	public function test_bookview_by_valid_uri()
    {
        $output = $this->request('GET', 'bookview/'. $this->valid_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains('<div id="productview">', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: bookview by invalid uri
	 * @author Ilkka
	 */
	public function test_bookview_by_invalid_uri()
    {
        $output = $this->request('GET', 'bookview/'. $this->invalid_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains("Invalid book ID '". $this->invalid_id_int."'.", $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: bookview by unused uri
	 * @author Ilkka
	 */
	public function test_bookview_by_unused_uri()
    {
        $output = $this->request('GET', 'bookview/'. $this->unused_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains("Invalid book ID '". $this->unused_id_int."'.", $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: bookview by malformed uri
	 * @author Ilkka
	 */
	public function test_bookview_by_malformed_uri()
    {
        $output = $this->request('GET', 'bookview/'. $this->malformed_id_string);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains("Invalid book ID '". $this->malformed_id_string."'.", $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: bookview by valid uri with commentlist
	 * @author Ilkka
	 */
	public function test_bookview_by_valid_uri_with_commentlist()
    {
        $output = $this->request('GET', 'bookview/'. $this->valid_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains('<div id="commentlist">', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: bookview by valid uri with reviews
	 * @author Ilkka
	 */
	public function test_bookview_by_valid_uri_with_reviews()
    {
        $output = $this->request('GET', 'bookview/'. $this->valid_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains('<div id="reviewlist">', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: bookview by valid uri with collections
	 */
	public function test_bookview_by_valid_uri_with_collections()
    {
        $output = $this->request('GET', 'bookview/'. $this->valid_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains('<div id="reviewlist">', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: bookview by valid uri no commenting without login
	 * @author Ilkka
	 */
	public function test_bookview_by_valid_uri_no_commentig_without_login()
    {
        $output = $this->request('GET', 'bookview/'. $this->valid_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertNotContains('<form accept-charset="UTF-8" class="form col-md-6" id="write_comment" role="form" action="" method="POST">', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
		
    }
	
	
	/**
	 * Page Test: review by  NULL uri
	 * @author Ilkka
	 */
	public function test_review_by_null_uri()
    {
        $output = $this->request('GET', 'review/');
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains('Invalid review ID \'\'', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: review by valid uri
	 * @author Ilkka
	 */
	public function test_review_by_valid_uri()
    {
        $output = $this->request('GET', 'review/'. $this->valid_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains('<div id="star-div">', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: review by valid uri with commentlist
	 * @author Ilkka
	 */
	public function test_review_by_valid_uri_with_commentlist()
    {
        $output = $this->request('GET', 'review/'. $this->valid_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains('<div id="commentlist">', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: review by valid uri no commenting without login
	 * @author Ilkka
	 */
	public function test_review_by_valid_uri_no_commenting_without_login()
    {
        $output = $this->request('GET', 'review/'. $this->valid_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertNotContains('<form accept-charset="UTF-8" class="form col-md-6" id="write_comment" role="form" action="" method="POST">', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
		
    }
	
	/**
	 * Page Test: review by invalid uri
	 * @author Ilkka
	 */
	public function test_review_by_invalid_uri()
    {
        $output = $this->request('GET', 'review/'. $this->invalid_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains("Invalid review ID '". $this->invalid_id_int."'.", $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: review by unused uri
	 * @author Ilkka
	 */
	public function test_review_by_unused_uri()
    {
        $output = $this->request('GET', 'review/'. $this->unused_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains("Invalid review ID '". $this->unused_id_int."'.", $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: review by malformed uri
	 * @author Ilkka
	 */
	public function test_review_by_malformed_uri()
    {
        $output = $this->request('GET', 'review/'. $this->malformed_id_string);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains("Invalid review ID '". $this->malformed_id_string."'.", $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: userview by  NULL uri
	 * @author Ilkka
	 */
	public function test_userview_by_null_uri()
    {
        $output = $this->request('GET', 'userview/');
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains('Invalid user ID \'\'', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: userview by valid uri
	 * @author Ilkka
	 */
	public function test_userview_by_valid_uri()
    {
        $output = $this->request('GET', 'userview/'. $this->valid_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains('<div id="userview">', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: userview by invalid uri
	 * @author Ilkka
	 */
	public function test_userview_by_invalid_uri()
    {
        $output = $this->request('GET', 'userview/'. $this->invalid_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains("Invalid user ID '". $this->invalid_id_int."'.", $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: userview by unused uri
	 * @author Ilkka
	 */
	public function test_userview_by_unused_uri()
    {
        $output = $this->request('GET', 'userview/'. $this->unused_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains("Invalid user ID '". $this->unused_id_int."'.", $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: userview by malformed uri
	 * @author Ilkka
	 */
	public function test_userview_by_malformed_uri()
    {
        $output = $this->request('GET', 'userview/'. $this->malformed_id_string);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains("Invalid user ID '". $this->malformed_id_string."'.", $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: userview by valid uri with commentlist
	 * @author Ilkka
	 */
	public function test_userview_by_valid_uri_with_commentlist()
    {
        $output = $this->request('GET', 'userview/'. $this->valid_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains('<div id="commentlist">', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: userview by valid uri with collections
	 * @author Ilkka
	 */
	public function test_userview_by_valid_uri_with_collections()
    {
        $output = $this->request('GET', 'userview/'. $this->valid_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains('<div id="userscollections">', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: userview by valid uri no commenting without login
	 * @author Ilkka
	 */
	public function test_userview_by_valid_uri_no_commenting_without_login()
    {
        $output = $this->request('GET', 'userview/'. $this->valid_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertNotContains('<form accept-charset="UTF-8" class="form col-md-6" id="write_comment" role="form" action="" method="POST">', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
		
    }
	
	
	/**
	 * Page Test: collectionview by  NULL uri
	 * @author Ilkka
	 */
	public function test_collectionview_by_null_uri()
    {
        $output = $this->request('GET', 'collectionview/');
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains('Invalid collection ID \'\'', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: collectionview by valid uri
	 * @author Ilkka
	 */
	public function test_collectionview_by_valid_uri()
    {
        $output = $this->request('GET', 'collectionview/'. $this->valid_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains('<div id="collectionview">', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: collectionview by invalid uri
	 * @author Ilkka
	 */
	public function test_collectionview_by_invalid_uri()
    {
        $output = $this->request('GET', 'collectionview/'. $this->invalid_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains("Invalid collection ID '". $this->invalid_id_int."'.", $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: collectionview by unused uri
	 * @author Ilkka
	 */
	public function test_collectionview_by_unused_uri()
    {
        $output = $this->request('GET', 'collectionview/'. $this->unused_id_int);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains("Invalid collection ID '". $this->unused_id_int."'.", $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: collectionview by malformed uri
	 * @author Ilkka
	 */
	public function test_collectionview_by_malformed_uri()
    {
        $output = $this->request('GET', 'collectionview/'. $this->malformed_id_string);
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains("Invalid collection ID '". $this->malformed_id_string."'.", $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: login by uri
	 * @author Ilkka
	 */
	public function test_login_by_uri()
    {
        $output = $this->request('GET', 'login');
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains('<input type="hidden" name="login_token"', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: profile-edit by uri without login
	 * @author Ilkka
	 */
	public function test_profile_edit_by_uri_without_login()
    {
        $output = $this->request('GET', 'profileedit');
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains('You need to be logged in to edit your profile.', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: registering by uri without login
	 * @author Ilkka
	 */
	public function test_registering_by_uri_without_login()
    {
        $output = $this->request('GET', 'register');
		//php header test
        $this->assertContains('<img id="logo"', $output);
		// php page test
		$this->assertContains('<h1 class="first-content-element">Register an Account', $output);
		// php footer php
		$this->assertContains('<footer class="navbar-inverse page-footer">', $output);
    }
	
	/**
	 * Page Test: reviewlist by uri
	 * @author Ilkka
	 */
	public function test_reviewlist_by_uri()
    {
        $output = $this->request('GET', 'reviewlist');
        $this->assertResponseCode(404);
    }
	
	/**
	 * Page Test: commentlist by uri
	 * @author Ilkka
	 */
	public function test_commentlist_by_uri()
    {
        $output = $this->request('GET', 'commentlist');
        $this->assertResponseCode(404);
    }
	
	/**
	 * Page Test: comment by uri
	 * @author Ilkka
	 */
	public function test_comment_by_uri()
    {
        $output = $this->request('GET', 'comment');
        $this->assertResponseCode(404);
    }
	
	/**
	 * Page Test: collectionlist by uri
	 * @author Ilkka
	 */
	public function test_collectionlist_by_uri()
    {
        $output = $this->request('GET', 'collectionlist');
        $this->assertResponseCode(404);
    }
	
	/**
	 * Page Test: login_form by uri
	 * @author Ilkka
	 */
	public function test_login_form_by_uri()
    {
        $output = $this->request('GET', 'login_form');
        $this->assertResponseCode(404);
    }
	
	/**
	 * Page Test: review_posted by uri
	 * @author Ilkka
	 */
	public function test_review_posted_by_uri()
    {
        $output = $this->request('GET', 'review_posted');
        $this->assertResponseCode(404);
    }
	
	/**
	 * Page Test: writereview by uri
	 * @author Ilkka
	 */
	public function test_writereview_by_uri()
    {
        $output = $this->request('GET', 'writereview');
        $this->assertResponseCode(404);
    }
	
	
}