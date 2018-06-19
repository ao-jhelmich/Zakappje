<?php

use Illuminate\Database\Seeder;
use App\Model\Book\Ranks;
use App\Model\Book\mainrequirements;
use App\Model\Book\requirements;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 4; $i++) { 
            Ranks::create([ 'rank_name' => "klas {$i}" ]);
            mainrequirements::create([
                'mainrequirements_name' => 'Navigatie & Zwerven',
                'mainrequirements_description' => "Navigatie & Zwerven voor {$i}",
                'mainrequirements_rank_id' => $i
            ]);

            mainrequirements::create([
                'mainrequirements_name' => 'Veiligheid & EHBO',
                'mainrequirements_description' => "Veiligheid & EHBO voor {$i}",
                'mainrequirements_rank_id' => $i
            ]);

            mainrequirements::create([
                'mainrequirements_name' => 'Scouting',
                'mainrequirements_description' => "Scouting voor {$i}",
                'mainrequirements_rank_id' => $i
            ]);

            mainrequirements::create([
                'mainrequirements_name' => 'Expressie',
                'mainrequirements_description' => "Expressie voor {$i}",
                'mainrequirements_rank_id' => $i
            ]);

            mainrequirements::create([
                'mainrequirements_name' => 'Koken',
                'mainrequirements_description' => "Koken voor {$i}",
                'mainrequirements_rank_id' => $i
            ]);

            mainrequirements::create([
                'mainrequirements_name' => 'Kamperen',
                'mainrequirements_description' => "Kamperen voor {$i}",
                'mainrequirements_rank_id' => $i
            ]);

            mainrequirements::create([
                'mainrequirements_name' => 'Pionieren',
                'mainrequirements_description' => "Pionieren voor {$i}",
                'mainrequirements_rank_id' => $i
            ]);

            mainrequirements::create([
                'mainrequirements_name' => 'Sport & Spel',
                'mainrequirements_description' => "Sport & Spel voor {$i}",
                'mainrequirements_rank_id' => $i
            ]);
            
            mainrequirements::create([
                'mainrequirements_name' => 'Omgeving',
                'mainrequirements_description' => "Omgeving voor {$i}",
                'mainrequirements_rank_id' => $i
            ]);

        }

        $mr_id = mainrequirements::where('mainrequirements_description', 'Navigatie & Zwerven voor 1')->first();

        requirements::create([
            'requirements_name' => 'Aangezichtsschets',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Plattegrond maken',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Meetmethoden',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => "Kompasoversteek ’s nachts",
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Hikeverslag maken',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        $mr_id = mainrequirements::where('mainrequirements_description', 'Navigatie & Zwerven voor 2')->first();

        requirements::create([
            'requirements_name' => 'Oriëntatie mbv kaart',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Legenda gevorderden',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Kruispeiling',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => "Achterband verwisselen",
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Kompasoversteek overdag',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Vliegroute',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Blinde oleaat',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        $mr_id = mainrequirements::where('mainrequirements_description', 'Navigatie & Zwerven voor 3')->first();

        requirements::create([
            'requirements_name' => 'Oost om/west om',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Gebruik legenda',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Coördinaat',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => "Fietsband plakken",
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Oleaat lopen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Strippenkaart maken',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Kruispuntenroute maken',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);
     
        $mr_id = mainrequirements::where('mainrequirements_description', 'Navigatie & Zwerven voor 4')->first();

        requirements::create([
            'requirements_name' => 'Windstreken',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Noorden aangeven op kaart',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Schaal',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => "Strippenkaart lopen",
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Kruispuntenroute lopen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);



        /**
         *  Veiligheid & EHBO
         */
        $mr_id = mainrequirements::where('mainrequirements_description', 'Veiligheid & EHBO voor 1')->first();

        requirements::create([
            'requirements_name' => 'Aks gebruik',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        $mr_id = mainrequirements::where('mainrequirements_description', 'Veiligheid & EHBO voor 2')->first();

        requirements::create([
            'requirements_name' => 'Blaren behandelen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Vuiltje uit oog verwijderen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Behandeling bij slagaderlijke bloeding',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => "Behandeling bij elektrische schok",
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Verkeersongeval simulatie',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        $mr_id = mainrequirements::where('mainrequirements_description', 'Veiligheid & EHBO voor 3')->first();

        requirements::create([
            'requirements_name' => 'Brandwond',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Wat te doen bij door ijs zakken',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Snijdwond',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => "Insectenbeet behandelen",
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Neusbloeding stoppen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Vingerverband aanleggen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Telefoonnummers noodgevallen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Zakmesgebruik',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);
     
        $mr_id = mainrequirements::where('mainrequirements_description', 'Veiligheid & EHBO voor 4')->first();

        requirements::create([
            'requirements_name' => 'Veiligheidsvoorschriften fietsen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Veiligheidsvoorschriften lopen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Veiligheidsvoorschriften houtvuur',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        /**
         *  Scouting
         */
        $mr_id = mainrequirements::where('mainrequirements_description', 'Scouting voor 1')->first();

        requirements::create([
            'requirements_name' => 'Leiding geven aan patrouille',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        $mr_id = mainrequirements::where('mainrequirements_description', 'Scouting voor 2')->first();

        requirements::create([
            'requirements_name' => 'Patrouille kas beheren',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Leiding geven aan patrouille',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        $mr_id = mainrequirements::where('mainrequirements_description', 'Scouting voor 3')->first();

        requirements::create([
            'requirements_name' => 'Kennis andere speltakken',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Groepshistorie kennis',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Wet en belofte uitleggen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => "Scoutingactiviteiten kennen",
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Uniform kennis',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);
     
        $mr_id = mainrequirements::where('mainrequirements_description', 'Scouting voor 4')->first();

        requirements::create([
            'requirements_name' => 'Vlaghijs techniek',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Vriendschapsknoop',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Wilhelmus',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'regio activiteit',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Wet en belofte',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        
        /**
         *  Expressie
         */
        $mr_id = mainrequirements::where('mainrequirements_description', 'Expressie voor 1')->first();

        requirements::create([
            'requirements_name' => 'Promoot een activiteit',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Zomerkampverslag maken',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        $mr_id = mainrequirements::where('mainrequirements_description', 'Expressie voor 2')->first();

        requirements::create([
            'requirements_name' => 'Kampvuurverhaal vertellen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Verhaal voor de website schrijven',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Toneelstukje maken en opvoeren',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        $mr_id = mainrequirements::where('mainrequirements_description', 'Expressie voor 3')->first();

        requirements::create([
            'requirements_name' => 'Patrouille hoek aankleden',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);
     
        $mr_id = mainrequirements::where('mainrequirements_description', 'Expressie voor 4')->first();

        requirements::create([
            'requirements_name' => 'Creatief zijn',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Kostuum kampthema',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Yells kennen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Kampvuurliedjes kennen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        /**
         *  Koken
         */
        $mr_id = mainrequirements::where('mainrequirements_description', 'Koken voor 1')->first();

        requirements::create([
            'requirements_name' => 'Menukaart',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Zomerkampverslag',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Gezonde vegetarische',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        $mr_id = mainrequirements::where('mainrequirements_description', 'Koken voor 2')->first();

        requirements::create([
            'requirements_name' => 'Inrichten keukentafel',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Kooktechnieken uitvoeren',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Water zuiveren',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Voedelschijf',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Inkooplijst',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Eigen recept koken',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Koken in thema',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Kennis soorten houtvuur',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        $mr_id = mainrequirements::where('mainrequirements_description', 'Koken voor 3')->first();

        requirements::create([
            'requirements_name' => 'Primitief koken',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Gebruik gasfornuis/gasfles',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Kooktechnieken noemen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Inrichten patrouille kist',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);
     
        $mr_id = mainrequirements::where('mainrequirements_description', 'Koken voor 4')->first();

        requirements::create([
            'requirements_name' => 'Houtvuur',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Hygiëne',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Afwas',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Jerrycan',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Snijdtechnieken',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Maaltijd op houtvuur',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);


        /**
         *  Kamperen
         */
        $mr_id = mainrequirements::where('mainrequirements_description', 'Kamperen voor 1')->first();

        requirements::create([
            'requirements_name' => 'Tentlocatie kiezen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Kampherinnering maken',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        $mr_id = mainrequirements::where('mainrequirements_description', 'Kamperen voor 2')->first();

        requirements::create([
            'requirements_name' => 'Primitief tentje maken',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Corvee rooster maken',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Vuurtafel maken',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Keukentafel opzetten',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Ruimtevaarder opzetten',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        $mr_id = mainrequirements::where('mainrequirements_description', 'Kamperen voor 3')->first();

        requirements::create([
            'requirements_name' => 'Inhoud patrouillekist',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Hiketas inpakken',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);
     
        $mr_id = mainrequirements::where('mainrequirements_description', 'Kamperen voor 4')->first();

        requirements::create([
            'requirements_name' => 'Keukentafel meehelpen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Ruimtevaarder',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Werking olielamp',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        /**
         *  Pionieren
         */
        $mr_id = mainrequirements::where('mainrequirements_description', 'Pionieren voor 1')->first();

        requirements::create([
            'requirements_name' => 'Paalsteek',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Schootsteek',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Touw/haak verbinding',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Grondboor',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Touw bezetten',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Groot object maken',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Spanband',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        $mr_id = mainrequirements::where('mainrequirements_description', 'Pionieren voor 2')->first();

        requirements::create([
            'requirements_name' => 'Timmersteek',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Vorkssjorring',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Diagonaalsjorring',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Gebruik tuigje',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Steiger sjorring',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Slingersjorring',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        $mr_id = mainrequirements::where('mainrequirements_description', 'Pionieren voor 3')->first();

        requirements::create([
            'requirements_name' => 'Achtknoop',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Kruissjorring ',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Achtvormige sjorring ',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Sleg gebruik ',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);
     
        $mr_id = mainrequirements::where('mainrequirements_description', 'Pionieren voor 4')->first();

        requirements::create([
            'requirements_name' => 'Mastworp',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Platte knoop',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Touw opschieten',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        /**
         *  Sport & Spel
         */
        $mr_id = mainrequirements::where('mainrequirements_description', 'Sport & Spel voor 1')->first();

        requirements::create([
            'requirements_name' => 'Pl dropping',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Ochtend gym organiseren',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Spel organiseren',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        $mr_id = mainrequirements::where('mainrequirements_description', 'Sport & Spel voor 2')->first();

        requirements::create([
            'requirements_name' => 'Kaderweekend',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Gaffelen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Buikschuif techniek',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        $mr_id = mainrequirements::where('mainrequirements_description', 'Sport & Spel voor 3')->first();

        requirements::create([
            'requirements_name' => 'Slootspringen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Touwladder beklimmen ',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Klimnet beklimmen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Beursspel uitleggen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Kikkersprong',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);
     
        requirements::create([
            'requirements_name' => 'Opdrukken',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        $mr_id = mainrequirements::where('mainrequirements_description', 'Sport & Spel voor 4')->first();

        requirements::create([
            'requirements_name' => 'Trappersbaan doen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Zwemdiploma A & B',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Aan ochtendgym  meedoen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Bosspel',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Overgang doen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        /**
         *  Omgeving
         */
        $mr_id = mainrequirements::where('mainrequirements_description', 'Omgeving voor 1')->first();

        requirements::create([
            'requirements_name' => 'Relevant interview leiding',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Praatje over jezelf',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        $mr_id = mainrequirements::where('mainrequirements_description', 'Omgeving voor 2')->first();

        requirements::create([
            'requirements_name' => 'Morse piramide maken',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Milieu',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        requirements::create([
            'requirements_name' => 'Ken je patrouille',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

        $mr_id = mainrequirements::where('mainrequirements_description', 'Omgeving voor 3')->first();

        requirements::create([
            'requirements_name' => 'Diersporen herkennen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Semafoorcode toepassen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        $mr_id = mainrequirements::where('mainrequirements_description', 'Omgeving voor 4')->first();

        requirements::create([
            'requirements_name' => 'Morsecode toepassen',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id,
        ]);

        requirements::create([
            'requirements_name' => 'Eigen geheimschrift maken',
            'requirements_mainrequirements_id' => $mr_id->mainrequirements_id
        ]);

    }
}
