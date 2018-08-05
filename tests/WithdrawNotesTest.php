<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class WithdrawTest extends TestCase
{

    /**
     * A test with 30 amount.
     *
     * @return void
     */
    public function testWithdrawNotes30()
    {
        $this->post('/api/withdraw',['amount'=>'30.00']);
        $this->assertEquals('["20.00","10.00"]', $this->response->getContent());
    }

    /**
     * A test with 80 amount.
     *
     * @return void
     */
    public function testWithdrawNotes80()
    {
        $this->post('/api/withdraw',['amount'=>'80.00']);
        $this->assertEquals('["50.00","20.00","10.00"]', $this->response->getContent());
    }

    /**
     * A test with 125 amount.
     *
     * @return void
     */
    public function testWithdrawNotes125()
    {
        $this->post('/api/withdraw',['amount'=>125.00]);
        $this->assertEquals('["NoteUnavailableException"]', $this->response->getContent());
    }

    /**
     * A test with -130 amount.
     *
     * @return void
     */
    public function testWithdrawNotesMinus130()
    {
        $this->post('/api/withdraw',['amount'=>-130.00]);
        $this->assertEquals('["InvalidArgumentException"]', $this->response->getContent());
    }

    /**
     * A test with NULL amount.
     *
     * @return void
     */
    public function testWithdrawNotesNull()
    {
        $this->post('/api/withdraw',['amount'=>'']);
        $this->assertEquals('[]', $this->response->getContent());
    }

}
