<?php

namespace RandomDataGenerator\Providers\en_GB;

use RandomDataGenerator\Providers\Defaults\Person as BasePerson;

class Person extends BasePerson
{
    protected static array $maleNameFormats = ['{{maleFirstName}} {{lastName}}'];
    protected static array $femaleNameFormats = ['{{femaleFirstName}} {{lastName}}'];

    /**
     * Roughly based on 2020 datatable at https://www.ons.gov.uk/peoplepopulationandcommunity/birthsdeathsandmarriages/livebirths/datasets/babynamesenglandandwalesbabynamesstatisticsboys
     */
    protected static array $maleFirstNames = [
        'Aaron', 'Adam', 'Alexander', 'Archie', 'Arthur', 'Benjamin', 'Billy', 'Bobby', 'Caleb', 'Charles',
        'Charlie', 'Chester', 'Cody', 'Daniel', 'David', 'Dominic', 'Dylan', 'Edward', 'Eli', 'Elijah',
        'Elliot', 'Ellis', 'Ethan', 'Ezra', 'Felix', 'Finn', 'Frankie', 'Freddy', 'Gabriel', 'George',
        'Harley', 'Harrison', 'Harry', 'Harvey', 'Henry', 'Hugo', 'Hunter', 'Isaac', 'Izaak', 'Jack',
        'Jackson', 'Jacob', 'James', 'Jasper', 'Jayden', 'Jenson', 'Jesse', 'Joey', 'Joseph', 'Joshua',
        'Jude', 'Kai', 'Kayden', 'Kevin', 'Killian', 'Leo', 'Leonardo', 'Lewis', 'Liam', 'Lincoln',
        'Logan', 'Louie', 'Louis', 'Luca', 'Lucas', 'Luke', 'Mason', 'Matthew', 'Michael', 'Milo',
        'Muhammed', 'Myles', 'Nathan', 'Nathaniel', 'Noah', 'Oliver', 'Ollie', 'Oscar', 'Owen', 'Patrick',
        'Paul', 'Peter', 'Phil', 'Reggie', 'Reuben', 'Robert', 'Ronan', 'Ronnie', 'Rory', 'Rupert',
        'Ryan', 'Samuel', 'Sebastian', 'Stanley', 'Teddy', 'Theo', 'Theodore', 'Thomas', 'Tobias', 'Toby',
        'Tommy', 'Tyler', 'Victor', 'Wilfred', 'William', 'Stephen', 'Steve', 'Timothy', 'Benji', 'Terry',
        'John', 'Jonathan', 'Alec', 'Karl', 'Cain', 'Fabian', 'Anthony', 'Ian', 'Shane', 'Keith'
    ];

    /**
     * Roughly based on 2020 datatable at https://www.ons.gov.uk/peoplepopulationandcommunity/birthsdeathsandmarriages/livebirths/datasets/babynamesenglandandwalesbabynamesstatisticsgirls
     */
    protected static array $femaleFirstNames = [
        'Abby', 'Abigail', 'Aisha', 'Alice', 'Amber', 'Amelia', 'Amelie', 'Anna', 'Alethia', 'Aria',
        'Ava', 'Ayla', 'Bella', 'Bonnie', 'Charlotte', 'Chloe', 'Clara', 'Daisy', 'Darcy', 'Delilah',
        'Eden', 'Edith', 'Eleanor', 'Eliza', 'Elizabeth', 'Ella', 'Ellen', 'Ellie', 'Emily', 'Emma',
        'Erin', 'Esme', 'Eva', 'Evelyn', 'Florence', 'Freya', 'Georgia', 'Grace', 'Hanna', 'Hannah',
        'Heidi', 'Holly', 'Imogen', 'Iris', 'Isabel', 'Isabella', 'Isla', 'Ivy', 'Jasmine', 'Jessica',
        'Layla', 'Lily', 'Lola', 'Lucy', 'Luna', 'Lyla', 'Maeve', 'Maisie', 'Margot', 'Maria',
        'Matilda', 'Maya', 'Mia', 'Millie', 'Mollie', 'Nancy', 'Octavia', 'Olive', 'Olivia', 'Orla',
        'Penelope', 'Penny', 'Phoebe', 'Robyn', 'Rose', 'Rosie', 'Ruby', 'Scarlett', 'Sienna', 'Sophia',
        'Sophie', 'Sara', 'Sarah', 'Summer', 'Thea', 'Victoria', 'Violet', 'Willow', 'Zara', 'India',
        'Chelsea', 'Anne', 'Mary', 'Megan', 'Louise', 'Lisa', 'Stephanie', 'Jaimee', 'Josephine', 'Kiesha'
    ];

    /**
     * Roughly based on https://forebears.io/england/surnames
     */
    protected static array $lastNames = [
        'Adams', 'Ahmed', 'Ali', 'Allen', 'Anderson', 'Andrews', 'Atkinson', 'Bailey', 'Baker', 'Barker',
        'Barnes', 'Bell', 'Bennett', 'Bradley', 'Brooks', 'Brown', 'Butler', 'Campbell', 'Carter', 'Chapman',
        'Clark', 'Clarke', 'Cole', 'Collins', 'Cook', 'Cooper', 'Cox', 'Davies', 'Davis', 'Day',
        'Dixon', 'Edwards', 'Elliott', 'Ellis', 'Evans', 'Fisher', 'Fletcher', 'Ford', 'Foster', 'Fox',
        'Gibson', 'Gill', 'Graham', 'Gray', 'Green', 'Griffiths', 'Hall', 'Harris', 'Harrison', 'Harvey',
        'Hill', 'Holmes', 'Howard', 'Hughes', 'Hunt', 'Hamilton', 'Jackson', 'James', 'Johnson', 'Jones',
        'Kelly', 'King', 'Knight', 'Lee', 'Lewis', 'Marshall', 'Martin', 'Mason', 'Matthews', 'Miller',
        'Mills', 'Mitchell', 'Moore', 'Morgan', 'Murray', 'Owen', 'Palmer', 'Patel', 'Payne', 'Pearce',
        'Pearson', 'Phillips', 'Price', 'Reynolds', 'Richards', 'Richardson', 'Russell', 'Scott', 'Simpson', 'Smith',
        'Spencer', 'Stevens', 'Taylor', 'Thompson', 'Turner', 'Walker', 'Webster', 'White', 'Williams', 'Young'
    ];
}