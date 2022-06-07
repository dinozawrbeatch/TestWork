# TestWork 
# API documentation
Запрос должен выглядеть так : http://testwork/api/?method=method_name
### Method addWorker :
Регистрирует пользователя
#### Params:
+ email - почта сотрудника
+ fullName - ФИО сотрудника 
+ age - возраст сотрудника
+ experience - опыт работы
+ avgSalary - средняя зарплата
+ photo - его фотография

#### Positive response:
{ result="ok", data = data }

#### Negative response:
{result = 'error'};

### Method getWorkers :
Возвращает всех сотрудников и их информацию

### Method getWorker :
Возвращает информацию об одном сотруднике
#### Params:
+ id
##### Positive response:
{ result="ok", data = worker }
##### Negative response:
{ result = 'error' };

# need
1. Сделать красивые стили