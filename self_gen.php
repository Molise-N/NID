<?php
include 'config/database.php'; // database connection file is named config/database.php

function generateIdNumber() {
    // Generate a unique 5-digit ID number
    $existing_ids = []; // Store generated IDs to avoid duplicates

    do {
        $id_number = rand(10000, 99999);
    } while (in_array($id_number, $existing_ids)); // Check for uniqueness in memory

    $existing_ids[] = $id_number; // Add generated ID to the list
    return $id_number;
}

function generateName() {
    // Pre-defined lists of first and second names
    $FirstNames = ['Molise', 'Thapelo', 'Teboho', 'Thabo', 'Katleho', 'Mpho', 'Lefa', 'Liketso', 'Neo', 'Nthati', 
    'Ntsane', 'Kopano', 'Tlotliso', 'Keketso', 'Mosehle', 'Tumelo', 'Kutloano', 'Mothusi', 'Mahlomola', 'Lebohang', 
    'Mamello', 'Tsepo', 'Phomolo', 'Sechaba', 'Libuseng', 'Malikete', 'Makatleho', 'Mahlape', 'Ntja', 'Thuto', 
    'Phumzile', 'Pontsho', 'Mabatho', 'Mampho', 'Molefi', 'Motlatsi', 'Mokete', 'Maliehe', 'Mapulane', 'Paballo', 
    'Malefetsane', 'Lefu', 'Tumelo', 'Sebaka', 'Kamohelo', 'Makalo', 'Mantoa', 'Matlali', 'Mathabo', 'Makhotso', 
    'Masupha', 'Nthabiseng', 'Neo', 'Mantsoe', 'Machere', 'Malome', 'Ntho', 'Khale', 'Ntsie', 'Lekeke', 
    'Mahase', 'Ntlhoko', 'Ntsu', 'Ntho', 'Phoka', 'Moholo', 'Thatho', 'Monyane', 'Ntshiu', 'Makhetha', 
    'Mamosebi', 'Matsie', 'Ntsoana', 'Ntsoaki', 'Matlhogonolo', 'Thabo', 'Matsepo', 'Mamphanya', 'Mosala', 'Tseliso', 
    'Thuto', 'Mohale', 'Maseriti', 'Thato', 'Thabang', 'Matsie', 'Moshoeshoe', 'Motselisi', 'Mokhali', 'Mafusi', 
    'Maphuthing', 'Mahlomola', 'Mothetjoa', 'Makhale', 'Mathabiso', 'Manthabe', 'Maphohlo', 'Mamoeti', 'Manthoto', 'Nteboheleng', 
    'Maphotse', 'Mahao', 'Mamahleleli', 'Nthabiseng', 'Nthabiseng', 'Malineo', 'Mahlako', 'Tlotliso', 'Masilo', 'Nthati', 
    'Makopano', 'Malerato', 'Tsepo', 'Mokete', 'Retsepile', 'Pontsho', 'Nkene', 'Mpolokeng', 'Majara', 'Maphoka', 
    'Mapeka', 'Mokhali', 'Machache', 'Mohale', 'Matlhogonolo', 'Mapulane', 'Malefane', 'Maphuthing', 'Nthabiseng', 'Mokhali', 
    'Malinyane', 'Nthabiseng', 'Mabatho', 'Lekhoele', 'Thabiso', 'Mosito', 'Masechaba', 'Mohale', 'Mahlomola', 'Malebohang', 
    'Maphoka', 'Kefuoe', 'Mahlomola', 'Makotoko', 'Makhakha', 'Makhoro', 'Mahlakiso', 'Mohau', 'Mankutu', 'Thato', 
    'Mahlomola', 'Maketse', 'Maphefo', 'Makholu', 'Mankotso', 'Mantsebo', 'Malisebo', 'Mankete', 'Mamokete', 'Mathibeli', 
    'Monaheng', 'Mohale', 'Molato', 'Moshe', 'Thokozile', 'Mantlwaneng', 'Nkhethoa', 'Makopano', 'Molapo', 'Moloi', 
    'Matete', 'Makamohelo', 'Ntsikeng', 'Majara', 'Mareabetsoe', 'Mahlomola', 'Masechaba', 'Majakane', 'Malefetsane', 'Mamello', 
    'Malefane', 'Mapholo', 'Mofihli', 'Maphefo', 'Molapo', 'Mohlotsane', 'Makholu', 'Makwetla', 'Mapula', 'Malebohang', 
    'Masechaba', 'Molise', 'Mahlomola', 'Mahlomola', 'Mamooki', 'Mamoruti', 'Mantoa', 'Mothetsi', 'Nthabiseng', 'Mamatsepe', 
    'Mamatsebe', 'Malefetsane', 'Makarabo', 'Maphuthing', 'Makara', 'Maserame', 'Maphohlo', 'Mathibeli', 'Mohlalisi', 'Mabatho', 
    'Maphopha', 'Mahlomola', 'Masabatha', 'Mahlakiso', 'Makhabane', 'Mathatho', 'Malefetsane', 'Manthabeleng', 'Mothekiso', 'Malerato', 
    'Makhotso', 'Matlali', 'Maseriti', 'Mantsoe', 'Makhetha', 'Mathapelo', 'Matseliso', 'Mokhesi', 'Makhakha', 'Makobo', 
    'Makwetsa', 'Matau', 'Matete', 'Mapotso', 'Malefane', 'Makoae', 'Molise', 'Makoro', 'Malikete', 'Mohau', 
    'Mahase', 'Makoloane', 'Mohlolo', 'Mapaballo', 'Malisebo', 'Matlakala', 'Mantlotle', 'Maputsoe', 'Makhakha', 'Mamabohloko', 
    'Mamello', 'Mantsebo', 'Mapula', 'Matlali', 'Malebohang', 'Makhotso', 'Mabolela', 'Makopano', 'Maserame', 'Mantle', 
    'Monaheng', 'Mathunyane', 'Malerato', 'Mamela', 'Mankoe', 'Makatleho', 'Maleshane', 'Mapaballo', 'Matumelo', 'Matlali', 
    'Makatleho', 'Mohau', 'Mahlomola', 'Malikete', 'Mamabolo', 'Malefane', 'Majakane', 'Mahlomola', 'Mampotsane','Amahle', 
    'Andiswa', 'Anathi', 'Anelisa', 'Ayanda', 'Babalwa', 'Buhle', 'Busisiwe', 'Chulumanco', 'Khanyisa', 'Khaya', 'Lethabo', '
    Lindiwe', 'Lulama', 'Lwandle', 'Mandisa', 'Mbali', 'Mihlali', 'Nobuhle', 'Nokubonga', 'Nomathamsanqa', 'Nomawethu', 'Nomzamo', 
    'Nontsikelelo', 'Nosisa', 'Ntombovuyo', 'Nosipho', 'Ntombizodwa', 'Phumzile', 'Sibongile', 'Sinesipho', 'Siphokazi', 'Thandolwethu',
    'Thandeka', 'Thobeka', 'Thozama', 'Thulisile', 'Thumeka', 'Tsholofelo', 'Vuyokazi', 'Wandiswa', 'Yamkela', 'Yolanda', 'Zimkhitha', 
    'Zintle', 'Zoleka', 'Zonke', 'Abongile', 'Akhona', 'Amanda', 'Anzani', 'Asanda', 'Athenkosi', 'Awande', 'Ayabulela', 'Azwile',
     'Bamanye', 'Bandile', 'Bhekithemba', 'Bonginkosi', 'Buhlebenkosi', 'Buyiselwa', 'Chumani', 'Dumisani', 'Esethu', 'Fumanekile',
      'Hlakanipha', 'Hlonela', 'Inam', 'Inga', 'Izwe', 'Jabulile', 'Khangelani', 'Khanyisile', 'Khululekani', 'Kuhlekonke', 'Lamla', 
      'Lelethu', 'Lilitha', 'Lisakhanya', 'Lithemba', 'Lubanzi', 'Lusanda', 'Lwethu', 'Makhosazana', 'Mandlakazi', 'Mandlenkosi', 
      'Mawande', 'Mcebisi', 'Mduduzi', 'Mfundo', 'Mhlengi', 'Mhlobo', 'Milisa', 'Miyelani', 'Ncumisa', 'Nkazimlo', 'Nkosi', 'Nobuntu', 
      'Nolundi', 'Nomalizo', 'Nomandla', 'Nomfundo', 'Nomonde', 'Nompumelelo', 'Nqobile', 'Ntando', 'Ntombentsha', 'Ntuthuzelo', 'Nwabisa', 
      'Olwethu', 'Onke', 'Onwaba', 'Onwabo', 'Onwani', 'Onwazi', 'Onwetu', 'Onwisa', 'Onwusi', 'Onwuthi', 'Ovayo', 'Phila', 'Sakhiwo', 
      'Sakhisizwe', 'Sandile', 'Sangoni', 'Sibulele', 'Sikhona', 'Siphamandla', 'Siphesihle', 'Siyabonga', 'Siyamthanda', 'Siyanda',
       'Siyasanga', 'Sonwabile', 'Thabo', 'Thanduxolo', 'Thokozani', 'Thulani', 'Thuthukani', 'Ubuhle', 'Ukwanda', 'Ulwazi', 'Umbulelo', 
       'Uyanda', 'Vuyo', 'Xabiso', 'Yamamkele', 'Yamkeli', 'Yanga', 'Yonela', 'Zanokuhle', 'Zintle', 'Zithulele', 'Zolani', 'Zuko',
        'Zwelibanzi', 'Abongile', 'Akhona', 'Amanda', 'Anzani', 'Asanda', 'Athenkosi', 'Awande', 'Ayabulela', 'Azwile', 'Bamanye', 
        'Bandile', 'Bhekithemba', 'Bonginkosi', 'Buhlebenkosi', 'Buyiselwa', 'Chumani', 'Dumisani', 'Esethu', 'Fumanekile', 'Hlakanipha', 
        'Hlonela', 'Inam', 'Inga', 'Izwe', 'Jabulile', 'Khangelani', 'Khanyisile', 'Khululekani', 'Kuhlekonke', 'Lamla', 'Lelethu', 
        'Lilitha', 'Lisakhanya', 'Lithemba', 'Lubanzi', 'Lusanda', 'Lwethu', 'Makhosazana', 'Mandlakazi', 'Mandlenkosi', 'Mawande', 
        'Mcebisi', 'Mduduzi', 'Mfundo', 'Mhlengi', 'Mhlobo', 'Milisa', 'Miyelani', 'Ncumisa', 'Nkazimlo', 'Nkosi', 'Nobuntu', 'Nolundi', 
        'Nomalizo', 'Nomandla', 'Nomfundo', 'Nomonde', 'Nompumelelo', 'Nqobile', 'Ntando', 'Ntombentsha', 'Ntuthuzelo', 'Nwabisa', 
        'Olwethu', 'Onke', 'Onwaba', 'Onwabo', 'Onwani', 'Onwazi', 'Onwetu', 'Onwisa', 'Onwusi', 'Onwuthi', 'Ovayo', 'Phila', 'Sakhiwo', 
        'Sakhisizwe', 'Sandile', 'Sangoni', 'Sibulele', 'Sikhona', 'Siphamandla', 'Siphesihle', 'Siyabonga', 'Siyamthanda', 'Siyanda', 
        'Siyasanga', 'Sonwabile', 'Thabo', 'Thanduxolo', 'Thokozani', 'Thulani', 'Thuthukani', 'Ubuhle', 'Ukwanda', 'Ulwazi', 'Umbulelo',
         'Uyanda', 'Vuyo', 'Xabiso', 'Yamamkele', 'Yamkeli', 'Yanga', 'Yonela', 'Zanokuhle', 'Zintle', 'Zithulele', 'Zolani', 'Zuko', 'Zwelibanzi',
         'Emma', 'Olivia', 'Ava', 'Isabella', 'Sophia', 'Charlotte', 'Mia', 'Amelia', 'Harper', 'Evelyn', 'Abigail', 'Emily', 'Elizabeth', 'Mila', 
         'Ella', 'Avery', 'Sofia', 'Camila', 'Aria', 'Scarlett', 'Victoria', 'Madison', 'Luna', 'Grace', 'Chloe', 'Penelope', 'Layla', 'Riley', 
         'Zoey', 'Nora', 'Lily', 'Eleanor', 'Hannah', 'Lillian', 'Addison', 'Aubrey', 'Ellie', 'Stella', 'Natalie', 'Zoe', 'Leah', 'Hazel', 
         'Violet', 'Aurora', 'Savannah', 'Audrey', 'Brooklyn', 'Bella', 'Claire', 'Skylar', 'Lucy', 'Paisley', 'Everly', 'Anna', 'Caroline', 
         'Nova', 'Genesis', 'Emilia', 'Kennedy', 'Samantha', 'Maya', 'Willow', 'Kinsley', 'Naomi', 'Aaliyah', 'Elena', 'Sarah', 'Ariana',
          'Allison', 'Gabriella', 'Alice', 'Madelyn', 'Cora', 'Ruby', 'Eva', 'Serenity', 'Autumn', 'Adeline', 'Hailey', 'Gianna', 'Valentina', 
          'Isla', 'Eliana', 'Quinn', 'Nevaeh', 'Ivy', 'Sadie', 'Piper', 'Lydia', 'Alexa', 'Josephine', 'Emery', 'Julia', 'Delilah', 'Arianna',
           'Vivian', 'Kaylee', 'Sophie', 'Brielle', 'Madeline', 'Peyton', 'Rylee', 'Clara', 'Hadley', 'Melanie', 'Mackenzie', 'Reagan', 'Adalynn',
            'Liliana', 'Aubree', 'Jade', 'Katherine', 'Isabelle', 'Natalia', 'Raelynn', 'Maria', 'Athena', 'Ximena', 'Arya', 'Leilani', 'Taylor', 
            'Faith', 'Rose', 'Kylie', 'Alexandra', 'Mary', 'Margaret', 'Lyla', 'Ashley', 'Amaya', 'Eliza', 'Brianna', 'Bailey', 'Andrea', 'Khloe', 
            'Jasmine', 'Melody', 'Iris', 'Isabel', 'Norah', 'Annabelle', 'Valeria', 'Trinity', 'Rachel', 'Daniela', 'Jocelyn', 'Reese', 'Aliyah',
             'Clara', 'Haley', 'Hope', 'Alina', 'Ryleigh', 'Juliana', 'Giselle', 'Lyla', 'Mya', 'Fatima', 'Fiona', 'River', 'Rosalie', 'Sara', 
             'Michelle', 'Emerson', 'Juliet', 'Abby', 'Lyric', 'Everleigh', 'Harmony', 'Elise', 'Adaline', 'Amara', 'Lexi', 'Laura', 'Anastasia', 
             'Alaina', 'Kayla', 'Diana', 'Alexis', 'Juliette', 'Sienna', 'Elliana', 'London', 'Lila', 'Lola', 'Stephanie', 'Sage', 'Selena', 'Nina', 
             'Phoebe', 'Lola', 'Lily', 'Madeline', 'Sophie', 'Isabelle', 'Chloe', 'Charlotte', 'Amelia', 'Emily', 'Mia', 'Olivia', 'Ella', 'Scarlett',
              'Grace', 'Layla', 'Lucy', 'Zoe', 'Aria', 'Emma', 'Ivy', 'Evie', 'Hannah', 'Ruby', 'Freya', 'Poppy', 'Matilda', 'Daisy', 'Eva', 'Harper', 
              'Willow', 'Sophia', 'Alice', 'Isabella', 'Evelyn', 'Maisie', 'Florence', 'Emilia', 'Millie', 'Sofia', 'Sienna', 'Rosie', 'Elsie', 'Erin', 
              'Amber', 'Molly', 'Ellie', 'Georgia', 'Thea', 'Maya', 'Eliza', 'Aurora', 'Eleanor', 'Clara', 'Phoebe', 'Bonnie', 'Maddison', 'Martha',
               'Elsie', 'Esme', 'Abigail', 'Lola', 'Nancy', 'Holly', 'Jessica', 'Gracie', 'Lottie', 'Amelie', 'Niamh', 'Robyn', 'Alisha', 'Zara', 
               'Imogen', 'Olive', 'Lyla', 'Iris', 'Annabelle', 'Skye', 'Ayla', 'Harriet', 'Beatrice', 'Arabella', 'Darcy', 'Anna', 'Ariana', 'Lydia',
                'Edith', 'Cora', 'Annie', 'Lottie', 'Margot', 'Libby', 'Francesca', 'Hallie', 'Jasmine', 'Orla', 'Tilly', 'Heidi', 'Violet', 'Mabel',
                 'Anya', 'Juliette', 'Delilah', 'Maria', 'Sara', 'Hannah', 'Sophie', 'Alice', 'Jessica', 'Zara', 'Eva', 'Georgia', 'Ella', 'Amelia', 
                 'Rosie', 'Holly', 'Molly', 'Eleanor', 'Poppy', 'Millie', 'Grace', 'Lily', 'Willow', 'Florence', 'Eliza', 'Phoebe', 'Sienna', 'Maisie', 
                 'Harriet', 'Freya', 'Niamh', 'Arabella', 'Imogen', 'Thea', 'Robyn', 'Anna', 'Iris', 'Clara', 'Aurora', 'Daisy', 'Isabella', 'Ruby', 
                 'Edith', 'Lydia', 'Matilda', 'Elsie', 'Lucy', 'Orla', 'Tilly', 'Martha', 'Lottie', 'Ariana', 'Nancy', 'Esme', 'Beatrice', 'Bonnie', 
                 'Mabel', 'Annie', 'Abigail', 'Ayla', 'Jessica', 'Margot', 'Lola', 'Libby', 'Skye', 'Elsie', 'Eva', 'Grace', 'Ivy', 'Mia', 'Sienna', 
                 'Sophia', 'Amelia', 'Freya', 'Lily', 'Phoebe', 'Alice', 'Charlotte', 'Daisy', 'Poppy', 'Harper', 'Maisie', 'Rosie', 'Willow', 'Evie',
                  'Matilda','Thandekile', 'Nkosazana', 'Mbuso', 'Lukhanyo', 'Buhle', 'Siphelele', 'Thandeka', 'Sinethemba', 'Mthokozisi', 'Nkululeko',
                  'Sinqobile', 'Bongiwe', 'Nkosi', 'Mthunzi', 'Zinhle', 'Nompumelelo', 'Thulani', 'Thandekile', 'Thandeka', 'Ntombizodwa',
                  'Nkululeko', 'Thandekile', 'Thandeka', 'Ntombizodwa', 'Thulani', 'Sinqobile', 'Bongiwe', 'Nompumelelo', 'Thulani', 'Thandekile',
                  'Thandeka', 'Ntombizodwa', 'Thulani', 'Sinqobile', 'Bongiwe', 'Nompumelelo', 'Thulani', 'Thandekile', 'Thandeka', 'Ntombizodwa',
                  'Thulani', 'Sinqobile', 'Bongiwe', 'Nompumelelo', 'Thulani', 'Thandekile', 'Thandeka', 'Ntombizodwa', 'Thulani', 'Sinqobile',
                  'Bongiwe', 'Nompumelelo', 'Thulani', 'Thandekile', 'Thandeka', 'Ntombizodwa', 'Thulani', 'Sinqobile', 'Bongiwe', 'Nompumelelo',
                  'Thulani', 'Thandekile', 'Thandeka', 'Ntombizodwa', 'Thulani', 'Sinqobile', 'Bongiwe', 'Nompumelelo', 'Thulani', 'Thandekile',
                  'Thandeka', 'Ntombizodwa', 'Thulani', 'Sinqobile', 'Bongiwe', 'Nompumelelo', 'Thulani', 'Thandekile', 'Thandeka', 'Ntombizodwa',
                  'Thulani', 'Sinqobile', 'Bongiwe', 'Nompumelelo', 'Thulani', 'Thandekile', 'Thandeka', 'Ntombizodwa', 'Thulani', 'Sinqobile',
                  'Bongiwe', 'Nompumelelo', 'Thulani', 'Thandekile', 'Thandeka', 'Ntombizodwa', 'Thulani', 'Sinqobile', 'Bongiwe', 'Nompumelelo'];

    $SecondNames = ['Makhetha', 'Mokhethi', 'Mosehle', 'Tumelo', 'Kutloano', 'Mothusi', 'Mahlomola', 'Lebohang', 'Mamello', 'Tsepo', 
    'Phomolo', 'Sechaba', 'Libuseng', 'Malikete', 'Makatleho', 'Mahlape', 'Thuto', 'Phumzile', 'Pontsho', 'Mabatho', 
    'Mampho', 'Molefi', 'Motlatsi', 'Mokete', 'Maliehe', 'Mapulane', 'Paballo', 'Malefetsane', 'Lefu', 'Sebaka', 
    'Kamohelo', 'Makalo', 'Mantoa', 'Matlali', 'Mathabo', 'Makhotso', 'Masupha', 'Nthabiseng', 'Mantsoe', 'Machere', 
    'Malome', 'Ntho', 'Khale', 'Ntsie', 'Lekeke', 'Mahase', 'Ntlhoko', 'Ntsu', 'Phoka', 'Moholo', 
    'Thatho', 'Monyane', 'Ntshiu', 'Makhetha', 'Mamosebi', 'Matsie', 'Ntsoana', 'Ntsoaki', 'Matlhogonolo', 'Matsepo', 
    'Mamphanya', 'Mosala', 'Tseliso', 'Mohale', 'Maseriti', 'Thato', 'Thabang', 'Moshoeshoe', 'Motselisi', 'Mokhali', 
    'Mafusi', 'Maphuthing', 'Mothetjoa', 'Makhale', 'Mathabiso', 'Manthabe', 'Maphohlo', 'Mamoeti', 'Manthoto', 'Nteboheleng', 
    'Maphotse', 'Mahao', 'Mamahleleli', 'Malineo', 'Mahlako', 'Malerato', 'Retsepile', 'Nkene', 'Mpolokeng', 'Majara', 
    'Maphoka', 'Mapeka', 'Machache', 'Matete', 'Makamohelo', 'Ntsikeng', 'Mareabetsoe', 'Majakane', 'Mapholo', 'Mofihli', 
    'Mohlotsane', 'Makwetla', 'Mapula', 'Masechaba', 'Mahlomola', 'Mamooki', 'Mamoruti', 'Mantoa', 'Mothetsi', 'Mamatsepe', 
    'Mamatsebe', 'Makarabo', 'Maserame', 'Maphopha', 'Masabatha', 'Makhabane', 'Mathatho', 'Manthabeleng', 'Mothekiso', 'Malerato', 
    'Makhotso', 'Matlali', 'Maseriti', 'Mantsoe', 'Makhetha', 'Mathapelo', 'Matseliso', 'Mokhesi', 'Makhakha', 'Makobo', 
    'Makwetsa', 'Matau', 'Mapotso', 'Malefane', 'Makoae', 'Molise', 'Makoro', 'Malikete', 'Mohau', 'Mahase', 
    'Makoloane', 'Mohlolo', 'Mapaballo', 'Malisebo', 'Matlakala', 'Mantlotle', 'Maputsoe', 'Makhakha', 'Mamabohloko', 'Mamello', 
    'Mantsebo', 'Mapula', 'Matlali', 'Malebohang', 'Makhotso', 'Mabolela', 'Makopano', 'Maserame', 'Mantle', 'Monaheng', 
    'Mathunyane', 'Mamela', 'Mankoe', 'Makatleho', 'Maleshane', 'Mapaballo', 'Matumelo', 'Malerato', 'Mamela', 'Masechaba', 
    'Molise', 'Mahlomola', 'Mamoruti', 'Mantoa', 'Mothetsi', 'Mamatsepe', 'Mamatsebe', 'Malerato', 'Makarabo', 'Maphuthing', 
    'Makara', 'Maserame', 'Maphohlo', 'Mathibeli', 'Mohlalisi', 'Mabatho','lerapo','Ntlhoki','Kepa'];

    // Randomly select names from the lists
    $FirstName = $FirstNames[array_rand($FirstNames)];
    $SecondName = $SecondNames[array_rand($SecondNames)];

    return "$FirstName $SecondName";
}

if (!isset($conn)) { // Check for database connection
    echo "Failed to connect to database!";
    exit;
}

for ($i = 0; $i < 1000000; $i++) {
    $id_number = generateIdNumber();
    $name = generateName();
    $birthday = date('Y-m-d', strtotime('-18 years')); // Generate random birthday within a range
    $residence = 'Maseru'; // Set residence

    $query = "INSERT into `user` (id_number, name, Birthday, Residence)
             VALUES ('$id_number', '$name', '$birthday', '$residence')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Error adding user $i: " . mysqli_error($conn);
        break; // Exit loop on error
    }
}

if ($i === 1000000) {
    echo "Successfully added 1,000,000 users!";
}
