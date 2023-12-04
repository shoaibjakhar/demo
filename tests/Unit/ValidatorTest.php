<?php 

use Core\Validator;

it("validates a strinng", function() {

    expect(Validator::string('foobar'))->toBeTrue();
    expect(Validator::string(''))->toBeFalse();
    expect(Validator::string(false))->toBeFalse();
});

it("It allows string not less then 20 characters", function() {

    expect(Validator::string("foobar", 20))->toBeFalse();
});

it("It validates an email", function() {

    expect(Validator::email('foobar'))->toBeFalse();
    expect(Validator::email('foobar@example.com'))->toBeTrue();
});

it("It validates a number greater than given amount", function() {
    expect(Validator::greaterThan(10, 1))->toBeTrue();
    expect(Validator::greaterThan(10, 100))->toBeFalse();
})->only();