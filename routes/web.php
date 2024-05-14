<?php

use Illuminate\Support\Facades\Route;


Route::get('login', 'AuthController@index')->name('login');
Route::get('/', 'HomeController@port')->name('home');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::post('post-login', 'AuthController@postLogin');
Route::get('registration', 'AuthController@registration');
Route::post('post-registration', 'AuthController@postRegistration');
//Route::get('dashboard', 'AuthController@dashboard');
Route::get('logout', 'AuthController@logout');


Route::resource('profile', 'ProfileController');
Route::resource('ticket', 'TicketController');
Route::resource('account', 'AccountController');
Route::get('/account-report', 'ReportController@accountReportIndex')->name('account-report');
Route::post('/show_account_report', 'ReportController@show_account_report')->name('show_account_report');

Route::get('/ticket-report', 'ReportController@ticketReportIndex')->name('ticket-report');
Route::post('/show_ticket_report', 'ReportController@show_ticket_report')->name('show_ticket_report');
Route::resource('bonuses', 'BonusController');
Route::resource('deposit', 'DepositController');
Route::resource('users', 'UserController');
Route::get('/tickets/pnr', 'TicketController@pnr');
Route::get('/reports/monthly', 'ReportController@monthly');
Route::get('/reports/points', 'PointReportController@index')->name('reports.points');
Route::get('/reports/download/monthly', 'PdfController@airlineReportMonthly');
Route::get('/reports/download/points', 'PointReportController@download')->name('reports.points.download');
Route::get('/tickets/point', 'TicketController@point')->name('ticket.point');
Route::post('/tickets/point-post/{ticket}', 'TicketController@pointPost')->name('ticket.pointPost');
Route::get('/tickets/refund/{ticket}', 'TicketController@refund')->name('ticket.refund');
Route::get('/tickets/refundPost/{ticket}', 'TicketController@refundPost')->name('ticket.refundPost');
Route::get('/ticket-reports/download/{ticket}', 'TicketReportsController@download')->name('ticket.download');
Route::get('/ticket-reports/download-all-tickets', 'TicketReportsController@downloadAllTickets')->name('ticket.download.all');


Route::get('/total-tickets', 'TicketController@totalTicket')->name('tickets.total_ticket');


