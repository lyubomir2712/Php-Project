House booking
Това е Php/Laravel приложение за системи за къщи за почивка. Идеята на приложението е един контрол панел в който имаме три основни компонента:
Локации(Cities), Типове почивки(holiday type) и къщи(holiday houses).
Главните операции на приложението са CRUD, като можем да създаваме, променяме, разглеждаме и премахваме локации, типове почивки и къщи.
Приложението разполага с 3 контролера(CityController.php, HolidayTypeController.php, HolidayHouseController.php),
 с 3 раута:

Route::resource('cities', CityController::class);

Route::resource('holiday_types', HolidayTypeController::class);

Route::resource('holiday_houses', HolidayHouseController::class);

Моделите са 3:
	city,
	holidayHouse,
	holidayType

Изгледите са 10

Миграциите са 4, като 3 са основните, а за 4-тата се наложи за да се добави колона image в таблицата за къщи в базата данни

 
	
