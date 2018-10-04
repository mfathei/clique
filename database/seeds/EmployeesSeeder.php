<?php

use App\Models\Employee;
use App\Models\Job;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('employees')->truncate();
        Schema::enableForeignKeyConstraints();

        $emp = Employee::create([
            'first_name' => 'Steven',
            'last_name' => 'King',
            'phone_number' => '515.123.4567',
            'email' => 'SKING',
            'hire_date' => '1987-6-17',
            'salary' => 24000,
            'commission_pct' => 0,
            'job_id' => Job::where('code', 'AD_PRES')->first()->id,
            'manager_id' => null,
            'department_id' => 3,
            'password' => Hash::make('password'),
        ]);

        $emp->roles()->detach();
        $emp->roles()->attach(Role::where('name', 'admin')->first()->id);

        $emp = Employee::create([
            'first_name' => 'Neena',
            'last_name' => 'Kochhar',
            'phone_number' => '515.123.4568',
            'email' => 'NKOCHHAR',
            'hire_date' => '1989-9-21',
            'salary' => 17000,
            'commission_pct' => 0,
            'job_id' => Job::where('code', 'AD_VP')->first()->id,
            'manager_id' => 1,
            'department_id' => 3,
            'password' => Hash::make('password'),
        ]);

        $emp->roles()->detach();
        $emp->roles()->attach(Role::where('name', 'manager')->first()->id);

        $emp = Employee::create([
            'first_name' => 'Lex',
            'last_name' => 'De Haan',
            'phone_number' => '515.123.4569',
            'email' => 'LDEHAAN',
            'hire_date' => '1993-1-13',
            'salary' => 17000,
            'commission_pct' => 0,
            'job_id' => Job::where('code', 'AD_VP')->first()->id,
            'manager_id' => 1,
            'department_id' => 3,
            'password' => Hash::make('password'),
        ]);

        $emp->roles()->detach();
        $emp->roles()->attach(Role::where('name', 'employee')->first()->id);

        $emp = Employee::create([
            'first_name' => 'Alexander',
            'last_name' => 'Hunold',
            'phone_number' => '590.423.4567',
            'email' => 'AHUNOLD',
            'hire_date' => '1990-1-3',
            'salary' => 9000,
            'commission_pct' => 0,
            'job_id' => Job::where('code', 'IT_PROG')->first()->id,
            'manager_id' => 2,
            'department_id' => 3,
            'password' => Hash::make('password'),
        ]);

        $emp->roles()->detach();
        $emp->roles()->attach(Role::where('name', 'employee')->first()->id);

        $emp = Employee::create([
            'first_name' => 'Bruce',
            'last_name' => 'Ernst',
            'phone_number' => '590.423.4568',
            'email' => 'BERNST',
            'hire_date' => '1991-5-21',
            'salary' => 6000,
            'commission_pct' => 0,
            'job_id' => Job::where('code', 'IT_PROG')->first()->id,
            'manager_id' => 2,
            'department_id' => 3,
            'password' => Hash::make('password'),
        ]);

        $emp->roles()->detach();
        $emp->roles()->attach(Role::where('name', 'employee')->first()->id);

        $emp = Employee::create([
            'first_name' => 'David',
            'last_name' => 'Austin',
            'phone_number' => '590.423.4569',
            'email' => 'DAUSTIN',
            'hire_date' => '1997-6-25',
            'salary' => 4800,
            'commission_pct' => 0,
            'job_id' => Job::where('code', 'IT_PROG')->first()->id,
            'manager_id' => 2,
            'department_id' => 3,
            'password' => Hash::make('password'),
        ]);

        $emp->roles()->detach();
        $emp->roles()->attach(Role::where('name', 'employee')->first()->id);

        /**
        
        INSERT INTO employees VALUES(
            106,
            'Valli',
            'Pataballa',
            'VPATABAL',
            '590.423.4560',
            TO_DATE('05-FEB-1998', 'dd-MON-yyyy'),
            'IT_PROG',
            4800,
            null,
            103,
            60
        );
        INSERT INTO employees VALUES(
            107,
            'Diana',
            'Lorentz',
            'DLORENTZ',
            '590.423.5567',
            TO_DATE('07-FEB-1999', 'dd-MON-yyyy'),
            'IT_PROG',
            4200,
            null,
            103,
            60
        );
        INSERT INTO employees VALUES(
            108,
            'Nancy',
            'Greenberg',
            'NGREENBE',
            '515.124.4569',
            TO_DATE('17-AUG-1994', 'dd-MON-yyyy'),
            'FI_MGR',
            12000,
            null,
            101,
            100
        );
        INSERT INTO employees VALUES(
            109,
            'Daniel',
            'Faviet',
            'DFAVIET',
            '515.124.4169',
            TO_DATE('16-AUG-1994', 'dd-MON-yyyy'),
            'FI_ACCOUNT',
            9000,
            null,
            108,
            100
        );
        INSERT INTO employees VALUES(
            110,
            'John',
            'Chen',
            'JCHEN',
            '515.124.4269',
            TO_DATE('28-SEP-1997', 'dd-MON-yyyy'),
            'FI_ACCOUNT',
            8200,
            null,
            108,
            100
        );
        INSERT INTO employees VALUES(
            111,
            'Ismael',
            'Sciarra',
            'ISCIARRA',
            '515.124.4369',
            TO_DATE('30-SEP-1997', 'dd-MON-yyyy'),
            'FI_ACCOUNT',
            7700,
            null,
            108,
            100
        );
        INSERT INTO employees VALUES(
            112,
            'Jose Manuel',
            'Urman',
            'JMURMAN',
            '515.124.4469',
            TO_DATE('07-MAR-1998', 'dd-MON-yyyy'),
            'FI_ACCOUNT',
            7800,
            null,
            108,
            100
        );
        INSERT INTO employees VALUES(
            113,
            'Luis',
            'Popp',
            'LPOPP',
            '515.124.4567',
            TO_DATE('07-DEC-1999', 'dd-MON-yyyy'),
            'FI_ACCOUNT',
            6900,
            null,
            108,
            100
        );
        INSERT INTO employees VALUES(
            114,
            'Den',
            'Raphaely',
            'DRAPHEAL',
            '515.127.4561',
            TO_DATE('07-DEC-1994', 'dd-MON-yyyy'),
            'PU_MAN',
            11000,
            null,
            100,
            30
        );
        INSERT INTO employees VALUES(
            115,
            'Alexander',
            'Khoo',
            'AKHOO',
            '515.127.4562',
            TO_DATE('18-MAY-1995', 'dd-MON-yyyy'),
            'PU_CLERK',
            3100,
            null,
            114,
            30
        );
        INSERT INTO employees VALUES(
            116,
            'Shelli',
            'Baida',
            'SBAIDA',
            '515.127.4563',
            TO_DATE('24-DEC-1997', 'dd-MON-yyyy'),
            'PU_CLERK',
            2900,
            null,
            114,
            30
        );
        INSERT INTO employees VALUES(
            117,
            'Sigal',
            'Tobias',
            'STOBIAS',
            '515.127.4564',
            TO_DATE('24-JUL-1997', 'dd-MON-yyyy'),
            'PU_CLERK',
            2800,
            null,
            114,
            30
        );
        INSERT INTO employees VALUES(
            118,
            'Guy',
            'Himuro',
            'GHIMURO',
            '515.127.4565',
            TO_DATE('15-NOV-1998', 'dd-MON-yyyy'),
            'PU_CLERK',
            2600,
            null,
            114,
            30
        );
        INSERT INTO employees VALUES(
            119,
            'Karen',
            'Colmenares',
            'KCOLMENA',
            '515.127.4566',
            TO_DATE('10-AUG-1999', 'dd-MON-yyyy'),
            'PU_CLERK',
            2500,
            null,
            114,
            30
        );
        INSERT INTO employees VALUES(
            120,
            'Matthew',
            'Weiss',
            'MWEISS',
            '650.123.1234',
            TO_DATE('18-JUL-1996', 'dd-MON-yyyy'),
            'ST_MAN',
            8000,
            null,
            100,
            50
        );
        INSERT INTO employees VALUES(
            121,
            'Adam',
            'Fripp',
            'AFRIPP',
            '650.123.2234',
            TO_DATE('10-APR-1997', 'dd-MON-yyyy'),
            'ST_MAN',
            8200,
            null,
            100,
            50
        );
        INSERT INTO employees VALUES(
            122,
            'Payam',
            'Kaufling',
            'PKAUFLIN',
            '650.123.3234',
            TO_DATE('01-MAY-1995', 'dd-MON-yyyy'),
            'ST_MAN',
            7900,
            null,
            100,
            50
        );
        INSERT INTO employees VALUES(
            123,
            'Shanta',
            'Vollman',
            'SVOLLMAN',
            '650.123.4234',
            TO_DATE('10-OCT-1997', 'dd-MON-yyyy'),
            'ST_MAN',
            6500,
            null,
            100,
            50
        );
        INSERT INTO employees VALUES(
            124,
            'Kevin',
            'Mourgos',
            'KMOURGOS',
            '650.123.5234',
            TO_DATE('16-NOV-1999', 'dd-MON-yyyy'),
            'ST_MAN',
            5800,
            null,
            100,
            50
        );
        INSERT INTO employees VALUES(
            125,
            'Julia',
            'Nayer',
            'JNAYER',
            '650.124.1214',
            TO_DATE('16-JUL-1997', 'dd-MON-yyyy'),
            'ST_CLERK',
            3200,
            null,
            120,
            50
        );
        INSERT INTO employees VALUES(
            126,
            'Irene',
            'Mikkilineni',
            'IMIKKILI',
            '650.124.1224',
            TO_DATE('28-SEP-1998', 'dd-MON-yyyy'),
            'ST_CLERK',
            2700,
            null,
            120,
            50
        );
        INSERT INTO employees VALUES(
            127,
            'James',
            'Landry',
            'JLANDRY',
            '650.124.1334',
            TO_DATE('14-JAN-1999', 'dd-MON-yyyy'),
            'ST_CLERK',
            2400,
            null,
            120,
            50
        );
        INSERT INTO employees VALUES(
            128,
            'Steven',
            'Markle',
            'SMARKLE',
            '650.124.1434',
            TO_DATE('08-MAR-2000', 'dd-MON-yyyy'),
            'ST_CLERK',
            2200,
            null,
            120,
            50
        );
        INSERT INTO employees VALUES(
            129,
            'Laura',
            'Bissot',
            'LBISSOT',
            '650.124.5234',
            TO_DATE('20-AUG-1997', 'dd-MON-yyyy'),
            'ST_CLERK',
            3300,
            null,
            121,
            50
        );
        INSERT INTO employees VALUES(
            130,
            'Mozhe',
            'Atkinson',
            'MATKINSO',
            '650.124.6234',
            TO_DATE('30-OCT-1997', 'dd-MON-yyyy'),
            'ST_CLERK',
            2800,
            null,
            121,
            50
        );
        INSERT INTO employees VALUES(
            131,
            'James',
            'Marlow',
            'JAMRLOW',
            '650.124.7234',
            TO_DATE('16-FEB-1997', 'dd-MON-yyyy'),
            'ST_CLERK',
            2500,
            null,
            121,
            50
        );
        INSERT INTO employees VALUES(
            132,
            'TJ',
            'Olson',
            'TJOLSON',
            '650.124.8234',
            TO_DATE('10-APR-1999', 'dd-MON-yyyy'),
            'ST_CLERK',
            2100,
            null,
            121,
            50
        );
        INSERT INTO employees VALUES(
            133,
            'Jason',
            'Mallin',
            'JMALLIN',
            '650.127.1934',
            TO_DATE('14-JUN-1996', 'dd-MON-yyyy'),
            'ST_CLERK',
            3300,
            null,
            122,
            50
        );
        INSERT INTO employees VALUES(
            134,
            'Michael',
            'Rogers',
            'MROGERS',
            '650.127.1834',
            TO_DATE('26-AUG-1998', 'dd-MON-yyyy'),
            'ST_CLERK',
            2900,
            null,
            122,
            50
        );
        INSERT INTO employees VALUES(
            135,
            'Ki',
            'Gee',
            'KGEE',
            '650.127.1734',
            TO_DATE('12-DEC-1999', 'dd-MON-yyyy'),
            'ST_CLERK',
            2400,
            null,
            122,
            50
        );
        INSERT INTO employees VALUES(
            136,
            'Hazel',
            'Philtanker',
            'HPHILTAN',
            '650.127.1634',
            TO_DATE('06-FEB-2000', 'dd-MON-yyyy'),
            'ST_CLERK',
            2200,
            null,
            122,
            50
        );
        INSERT INTO employees VALUES(
            137,
            'Renske',
            'Ladwig',
            'RLADWIG',
            '650.121.1234',
            TO_DATE('14-JUL-1995', 'dd-MON-yyyy'),
            'ST_CLERK',
            3600,
            null,
            123,
            50
        );
        INSERT INTO employees VALUES(
            138,
            'Stephen',
            'Stiles',
            'SSTILES',
            '650.121.2034',
            TO_DATE('26-OCT-1997', 'dd-MON-yyyy'),
            'ST_CLERK',
            3200,
            null,
            123,
            50
        );
        INSERT INTO employees VALUES(
            139,
            'John',
            'Seo',
            'JSEO',
            '650.121.2019',
            TO_DATE('12-FEB-1998', 'dd-MON-yyyy'),
            'ST_CLERK',
            2700,
            null,
            123,
            50
        );
        INSERT INTO employees VALUES(
            140,
            'Joshua',
            'Patel',
            'JPATEL',
            '650.121.1834',
            TO_DATE('06-APR-1998', 'dd-MON-yyyy'),
            'ST_CLERK',
            2500,
            null,
            123,
            50
        );
        INSERT INTO employees VALUES(
            141,
            'Trenna',
            'Rajs',
            'TRAJS',
            '650.121.8009',
            TO_DATE('17-OCT-1995', 'dd-MON-yyyy'),
            'ST_CLERK',
            3500,
            null,
            124,
            50
        );
        INSERT INTO employees VALUES(
            142,
            'Curtis',
            'Davies',
            'CDAVIES',
            '650.121.2994',
            TO_DATE('29-JAN-1997', 'dd-MON-yyyy'),
            'ST_CLERK',
            3100,
            null,
            124,
            50
        );
        INSERT INTO employees VALUES(
            143,
            'Randall',
            'Matos',
            'RMATOS',
            '650.121.2874',
            TO_DATE('15-MAR-1998', 'dd-MON-yyyy'),
            'ST_CLERK',
            2600,
            null,
            124,
            50
        );
        INSERT INTO employees VALUES(
            144,
            'Peter',
            'Vargas',
            'PVARGAS',
            '650.121.2004',
            TO_DATE('09-JUL-1998', 'dd-MON-yyyy'),
            'ST_CLERK',
            2500,
            null,
            124,
            50
        );
        INSERT INTO employees VALUES(
            145,
            'John',
            'Russell',
            'JRUSSEL',
            '011.44.1344.429268',
            TO_DATE('01-OCT-1996', 'dd-MON-yyyy'),
            'SA_MAN',
            14000,
            .4,
            100,
            80
        );
        INSERT INTO employees VALUES(
            146,
            'Karen',
            'Partners',
            'KPARTNER',
            '011.44.1344.467268',
            TO_DATE('05-JAN-1997', 'dd-MON-yyyy'),
            'SA_MAN',
            13500,
            .3,
            100,
            80
        );
        INSERT INTO employees VALUES(
            147,
            'Alberto',
            'Errazuriz',
            'AERRAZUR',
            '011.44.1344.429278',
            TO_DATE('10-MAR-1997', 'dd-MON-yyyy'),
            'SA_MAN',
            12000,
            .3,
            100,
            80
        );
        */
    }
}
