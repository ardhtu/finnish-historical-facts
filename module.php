<?php

/**
 * webtrees: online genealogy
 * Copyright (C) 2020 webtrees development team
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */ 
 
declare(strict_types=1);

namespace Tunkkari\WebtreesModules\History\finnish_presidents_greatdutches_and_kings;

use Fisharebest\Localization\Translation;
use Fisharebest\Webtrees\I18N;
use Fisharebest\Webtrees\Module\AbstractModule;
use Fisharebest\Webtrees\Module\ModuleCustomInterface;
use Fisharebest\Webtrees\Module\ModuleCustomTrait;
use Fisharebest\Webtrees\Module\ModuleHistoricEventsTrait;
use Fisharebest\Webtrees\Module\ModuleHistoricEventsInterface;
use Illuminate\Support\Collection;

/** 
 * Historical facts (in finnish): Presidents of Finland (1917 - present), great dutches (1809 - 1917) and kings (about 1500 - 1809), other histrical facts
 */
return new class extends AbstractModule implements ModuleCustomInterface, ModuleHistoricEventsInterface {
    use ModuleCustomTrait;
    use ModuleHistoricEventsTrait;

    public const CUSTOM_TITLE = 'Suomen historialliset tapahtumat';

    public const CUSTOM_AUTHOR = 'Hannu Tunkkari';
    
    public const CUSTOM_WEBSITE = 'https://sukupuu.tunkkari.fi';

    public const CUSTOM_VERSION = '0.0.0.1';

    public const CUSTOM_LAST = 'https://sukupuu.tunkkari.fi';

    /**
     * Constructor.  The constructor is called on *all* modules, even ones that are disabled.
     * This is a good place to load business logic ("services").  Type-hint the parameters and
     * they will be injected automatically.
     */
    public function __construct()
    {
        // NOTE:  If your module is dependent on any of the business logic ("services"),
        // then you would type-hint them in the constructor and let webtrees inject them
        // for you.  However, we can't use dependency injection on anonymous classes like
        // this one. For an example of this, see the example-server-configuration module.
    }

    /**
     * Bootstrap.  This function is called on *enabled* modules.
     * It is a good place to register routes and views.
     *
     * @return void
     */
    public function boot(): void
    {
    }

    /**
     * How should this module be identified in the control panel, etc.?
     *
     * @return string
     */
    public function title(): string
    {
        return self::CUSTOM_TITLE;
    }

    /**
     * A sentence describing what this module does.
     *
     * @return string
     */
    public function description(): string
    {
        return I18N::translate('Historical facts (in Finnish) - Presidentit, suuriruhtinaat ja kuninkaat');
    }

    /**
     * The person or organisation who created this module.
     *
     * @return string
     */
    public function customModuleAuthorName(): string
    {
        return self::CUSTOM_AUTHOR;
    }

    /**
     * The version of this module.
     *
     * @return string
     */
    public function customModuleVersion(): string
    {
        return self::CUSTOM_VERSION;
    }

    /**
     * A URL that will provide the latest version of this module.
     *
     * @return string
     */
        public function customModuleLatestVersionUrl(): string
    {
        return self::CUSTOM_LAST;
    }

    /**
     * Where to get support for this module.  Perhaps a github respository?
     *
     * @return string
     */
    public function customModuleSupportUrl(): string
    {
        return self::CUSTOM_WEBSITE;
    }

    /**
     * Should this module be enabled when it is first installed?
     *
     * @return bool
     */
    public function isEnabledByDefault(): bool
    {
        return false;
    }

    /**
     * Where does this module store its resources
     *
     * @return string
     */
    public function resourcesFolder(): string
    {
        return __DIR__ . '/resources/';
    }
    
    /**
     * Additional/updated translations.
     *
     * @param string $language
     *
     * @return string[]
     */
    
    public function customTranslations(string $language): array
    {
        switch ($language) {
            case 'fi':
                // Arrays are preferred, and faster.
                // If your module uses .MO files, then you can convert them to arrays like this.
                return (new Translation(__DIR__ . '/resources/language/fi.mo'))->asArray();
    
            default:
                return [];
        }
    }

    /**
     * All events provided by this module.
     * 
     * Each line is a GEDCOM style record to describe an event (EVEN), including newline chars (\n)
     *      1 EVEN <title>
     *      2 TYPE <short category name>
     *      2 DATE <date or date period>
     *      2 NOTE <comment or [wikipedia de](<link>)>
     *
     * @return Collection<string>
     */
    
    public function historicEventsAll(): Collection
    {
        return new Collection([
// Ruotsin kuninkaat, Kings of Sweden:
        "1 EVEN Kustaa I Vaasa (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE 6 JUN 1523\n2 NOTE https://fi.wikipedia.org/wiki/Kustaa_Vaasa",
        "1 EVEN Eerik XIV (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE 29 SEP 1560\n2 NOTE https://fi.wikipedia.org/wiki/Eerik_XIV",
        "1 EVEN Juhana III (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE 29 SEP 1568\n2 NOTE https://fi.wikipedia.org/wiki/Juhana_III",
        "1 EVEN Sigismund (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE 17 NOV 1592\n2 NOTE https://fi.wikipedia.org/wiki/Sigismund",
        "1 EVEN Kaarle IX (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE 24 JUL 1599\n2 NOTE https://fi.wikipedia.org/wiki/Kaarle_IX",
        "1 EVEN Kustaa II Aadolf (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE 30 OCT 1611\n2 NOTE https://fi.wikipedia.org/wiki/Kustaa_II_Aadolf",
        "1 EVEN Kristiina (Ruotsi)\n2 TYPE Ruotsin kuningatar\n2 DATE 6 NOV 1632\n2 NOTE https://fi.wikipedia.org/wiki/Kristiina",
        "1 EVEN Kaarle X Kustaa (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE 6 JUN 1654\n2 NOTE https://fi.wikipedia.org/wiki/Kaarle_X_Kustaa",
        "1 EVEN Kaarle XI (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE 13 FEB 1660\n2 NOTE https://fi.wikipedia.org/wiki/Kaarle_XI",
        "1 EVEN Kaarle XII (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE 5 MAR 1697\n2 NOTE https://fi.wikipedia.org/wiki/Kaarle_XII",
        "1 EVEN Ulrika Eleonora (Ruotsi)\n2 TYPE Ruotsin kuningatar\n2 DATE 2 APR 1719\n2 NOTE https://fi.wikipedia.org/wiki/Ulrika_Eleonora",
        "1 EVEN Fredrik I (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE 4 APR 1720\n2 NOTE https://fi.wikipedia.org/wiki/Fredrik_I_(Ruotsi)",
        "1 EVEN Aadolf Fredrik (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE 5 APR 1751\n2 NOTE https://fi.wikipedia.org/wiki/Aadolf_Fredrik",
        "1 EVEN Kustaa III (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE 12 FEB 1771\n2 NOTE https://fi.wikipedia.org/wiki/Kustaa_III",
        "1 EVEN Kustaa IV Aadolf (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE 29 MAR 1792\n2 NOTE https://fi.wikipedia.org/wiki/Kustaa_IV_Aadolf",
        "1 EVEN Friedrich Karl eli Väinö I (Saksa)\n2 TYPE Suomen kuningas\n2 DATE 9 OCT 1918\n2 NOTE https://fi.wikipedia.org/wiki/Friedrich_Karl",
// Suuriruhtinaat, Venäjän keisarit, Great Dutches, Russian Emperors:
        "1 EVEN Aleksanteri I (Venäjä)\n2 TYPE Venäjän Tsaari, Suomen suuriruhtinas\n2 DATE 24 MAR 1801\n2 NOTE https://fi.wikipedia.org/wiki/Aleksanteri_I",
        "1 EVEN Nikolai I (Venäjä)\n2 TYPE Venäjän Tsaari, Suomen suuriruhtinas\n2 DATE 26 DEC 1821\n2 NOTE https://fi.wikipedia.org/wiki/Nikolai_I",
        "1 EVEN Aleksanteri II (Venäjä)\n2 TYPE Venäjän Tsaari, Suomen suuriruhtinas\n2 DATE 2 MAR 1855\n2 NOTE https://fi.wikipedia.org/wiki/Aleksanteri_II_(Ven%C3%A4j%C3%A4)",
        "1 EVEN Aleksanteri III (Venäjä)\n2 TYPE Venäjän Tsaari, Suomen suuriruhtinas\n2 DATE 13 MAR 1881\n2 NOTE https://fi.wikipedia.org/wiki/Aleksanteri_III_(Ven%C3%A4j%C3%A4)",
        "1 EVEN Nikolai II (Venäjä)\n2 TYPE Venäjän Tsaari, Suomen suuriruhtinas\n2 DATE 1 NOV 1894\n2 NOTE https://fi.wikipedia.org/wiki/Nikolai_II",
// Valtionhoitajat
        "1 EVEN P. E. Svinhufvud \n2 TYPE Suomen 1. valtionhoitaja\n2 DATE 25 MAY 1918\n2 NOTE https://fi.wikipedia.org/wiki/P._E._Svinhufvud",
        "1 EVEN Carl Gustaf Emil Mannerheim \n2 TYPE Suomen 2. valtionhoitaja\n2 DATE 12 DEC 1918\n2 NOTE https://fi.wikipedia.org/wiki/Carl_Gustaf_Emil_Mannerheim",
// Presidentit
        "1 EVEN K. J. Ståhlberg \n2 TYPE Suomen 1. presidentti\n2 DATE 25 JUL 1919\n2 NOTE https://fi.wikipedia.org/wiki/K._J._St%C3%A5hlberg",
        "1 EVEN Lauri Kristian Relander \n2 TYPE Suomen 2. presidentti\n2 DATE 2 MAR 1925\n2 NOTE https://fi.wikipedia.org/wiki/Lauri_Kristian_Relander",
        "1 EVEN P. E. Svinhufvud \n2 TYPE Suomen 3. presidentti\n2 DATE 2 MAR 1931\n2 NOTE https://fi.wikipedia.org/wiki/P._E._Svinhufvud",
        "1 EVEN Kyösti Kallio \n2 TYPE Suomen 4. presidentti\n2 DATE 1 MAR 1937\n2 NOTE https://fi.wikipedia.org/wiki/Ky%C3%B6sti_Kallio",
        "1 EVEN Risto Ryti \n2 TYPE Suomen 5. presidentti\n2 DATE 19 DEC 1940\n2 NOTE https://fi.wikipedia.org/wiki/Risto_Ryti",
        "1 EVEN Carl Gustaf Emil Mannerheim \n2 TYPE Suomen 6. presidentti\n2 DATE 4 AUG 1944\n2 NOTE https://fi.wikipedia.org/wiki/Carl_Gustaf_Emil_Mannerheim",
        "1 EVEN J. K. Paasikivi \n2 TYPE Suomen 7. presidentti\n2 DATE 11 MAR 1946\n2 NOTE https://fi.wikipedia.org/wiki/J._K._Paasikivi",
        "1 EVEN Urho Kekkonen \n2 TYPE Suomen 8. presidentti\n2 DATE 1 MAR 1956\n2 NOTE https://fi.wikipedia.org/wiki/Urho_Kekkonen",
        "1 EVEN Mauno Koivisto \n2 TYPE Suomen 9. presidentti\n2 DATE 27 JAN 1982\n2 NOTE https://fi.wikipedia.org/wiki/Mauno_Koivisto",
        "1 EVEN Martti Ahtisaari \n2 TYPE Suomen 10. presidentti\n2 DATE 1 MAR 1994\n2 NOTE https://fi.wikipedia.org/wiki/Martti_Ahtisaari",
        "1 EVEN Tarja Halonen \n2 TYPE Suomen 11. presidentti\n2 DATE 1 MAR 2000\n2 NOTE https://fi.wikipedia.org/wiki/Tarja_Halonen",
        "1 EVEN Sauli Niinistö \n2 TYPE Suomen 12. presidentti\n2 DATE 1 MAR 2012\n2 NOTE https://fi.wikipedia.org/wiki/Sauli_Niinist%C3%B6",
// Pääministerit
        "1 EVEN P. E. Svinhufvud \n2 TYPE Suomen 1. pääministeri\n2 DATE 27 NOV 1917\n2 NOTE https://fi.wikipedia.org/wiki/P._E._Svinhufvud",
        "1 EVEN J. K. Paasikivi \n2 TYPE Suomen 2. pääministeri\n2 DATE 27 MAY 1918\n2 NOTE https://fi.wikipedia.org/wiki/J._K._Paasikivi",
        "1 EVEN Lauri Ingman \n2 TYPE Suomen 3. pääministeri\n2 DATE 27 NOV 1918\n2 NOTE https://fi.wikipedia.org/wiki/Lauri_Ingman",
        "1 EVEN Kaarlo Castrén \n2 TYPE Suomen 4. pääministeri\n2 DATE 17 APR 1919\n2 NOTE https://fi.wikipedia.org/wiki/Kaarlo_Castr%C3%A9n",
        "1 EVEN J. H. Vennola \n2 TYPE Suomen 5. pääministeri\n2 DATE 15 AUG 1919\n2 NOTE https://fi.wikipedia.org/wiki/J._H._Vennola",
        "1 EVEN Rafael Erich \n2 TYPE Suomen 6. pääministeri\n2 DATE 15 MAR 1920\n2 NOTE https://fi.wikipedia.org/wiki/Rafael_Erich",
        "1 EVEN J. H. Vennola \n2 TYPE Suomen 7. pääministeri\n2 DATE 9 APR 1921\n2 NOTE https://fi.wikipedia.org/wiki/J._H._Vennola",
        "1 EVEN A. K. Cajander \n2 TYPE Suomen 8. pääministeri\n2 DATE 2 JUN 1922\n2 NOTE https://fi.wikipedia.org/wiki/A._K._Cajander",
        "1 EVEN Kyösti Kallio \n2 TYPE Suomen 9. pääministeri\n2 DATE 14 NOV 1922\n2 NOTE https://fi.wikipedia.org/wiki/Ky%C3%B6sti_Kallio",
        "1 EVEN A. K. Cajander \n2 TYPE Suomen 10. pääministeri\n2 DATE 19 JAN 1924\n2 NOTE https://fi.wikipedia.org/wiki/A._K._Cajander",
        "1 EVEN Lauri Ingman \n2 TYPE Suomen 11. pääministeri\n2 DATE 31 MAY 1924\n2 NOTE https://fi.wikipedia.org/wiki/Lauri_Ingman",
        "1 EVEN Antti Tulenheimo \n2 TYPE Suomen 12. pääministeri\n2 DATE 31 MAR 1925\n2 NOTE https://fi.wikipedia.org/wiki/Antti_Tulenheimo",
        "1 EVEN Kyösti Kallio \n2 TYPE Suomen 13. pääministeri\n2 DATE 31 DEC 1925\n2 NOTE https://fi.wikipedia.org/wiki/Ky%C3%B6sti_Kallio",
        "1 EVEN Väinö Tanner \n2 TYPE Suomen 14. pääministeri\n2 DATE 13 DEC 1926\n2 NOTE https://fi.wikipedia.org/wiki/V%C3%A4in%C3%B6_Tanner",
        "1 EVEN Juho Sunila \n2 TYPE Suomen 15. pääministeri\n2 DATE 17 DEC 1927\n2 NOTE https://fi.wikipedia.org/wiki/Juho_Sunila",
        "1 EVEN Oskari Mantere \n2 TYPE Suomen 16. pääministeri\n2 DATE 22 DEC 1928\n2 NOTE https://fi.wikipedia.org/wiki/Oskari_Mantere",
        "1 EVEN Kyösti Kallio \n2 TYPE Suomen 17. pääministeri\n2 DATE 16 AUG 1929\n2 NOTE https://fi.wikipedia.org/wiki/Ky%C3%B6sti_Kallio",
        "1 EVEN P. E. Svinhufvud \n2 TYPE Suomen 18. pääministeri\n2 DATE 4 JUL 1930\n2 NOTE https://fi.wikipedia.org/wiki/P._E._Svinhufvud",
        "1 EVEN Juho Sunila \n2 TYPE Suomen 19. pääministeri\n2 DATE 21 MAR 1931\n2 NOTE https://fi.wikipedia.org/wiki/Juho_Sunila",
        "1 EVEN Toivo Kivimäki \n2 TYPE Suomen 20. pääministeri\n2 DATE 14 DEC 1932\n2 NOTE https://fi.wikipedia.org/wiki/Toivo_Kivim%C3%A4ki",
        "1 EVEN Kyösti Kallio \n2 TYPE Suomen 21. pääministeri\n2 DATE 7 OCT 1936\n2 NOTE https://fi.wikipedia.org/wiki/Ky%C3%B6sti_Kallio",
        "1 EVEN A. K. Cajander \n2 TYPE Suomen 22. pääministeri\n2 DATE 12 MAR 1937\n2 NOTE https://fi.wikipedia.org/wiki/A._K._Cajander",
        "1 EVEN Risto Ryti \n2 TYPE Suomen 23. ja 24. pääministeri\n2 DATE 1 DEC 1939\n2 NOTE https://fi.wikipedia.org/wiki/Risto_Ryti",
        "1 EVEN Jukka Rangell \n2 TYPE Suomen 25. pääministeri\n2 DATE 3 JAN 1941\n2 NOTE https://fi.wikipedia.org/wiki/Jukka_Rangell",
        "1 EVEN Edwin Linkomies \n2 TYPE Suomen 26. pääministeri\n2 DATE 5 MAR 1943\n2 NOTE https://fi.wikipedia.org/wiki/Edwin_Linkomies",
        "1 EVEN Antti Hackzell \n2 TYPE Suomen 27. pääministeri\n2 DATE 8 AUG 1944\n2 NOTE https://fi.wikipedia.org/wiki/Antti_Hackzell",
        "1 EVEN Urho Castrén \n2 TYPE Suomen 28. pääministeri\n2 DATE 21 SEP 1944\n2 NOTE https://fi.wikipedia.org/wiki/Urho_Castr%C3%A9n",
        "1 EVEN J. K. Paasikivi \n2 TYPE Suomen 29. ja 30. pääministeri\n2 DATE 17 NOV 1944\n2 NOTE https://fi.wikipedia.org/wiki/J._K._Paasikivi",
        "1 EVEN Mauno Pekkala \n2 TYPE Suomen 31. pääministeri\n2 DATE 26 MAR 1946\n2 NOTE https://fi.wikipedia.org/wiki/Mauno_Pekkala",
        "1 EVEN K. A. Fagerholm \n2 TYPE Suomen 32. pääministeri\n2 DATE 29 JUL 1948\n2 NOTE https://fi.wikipedia.org/wiki/K.-A._Fagerholm",
        "1 EVEN Urho Kekkonen \n2 TYPE Suomen 33., 34., 35. ja 36. pääministeri\n2 DATE 17 MAR 1950\n2 NOTE https://fi.wikipedia.org/wiki/Urho_Kekkonen",
        "1 EVEN Sakari Tuomioja \n2 TYPE Suomen 37. pääministeri\n2 DATE 17 NOV 1953\n2 NOTE https://fi.wikipedia.org/wiki/Sakari_Tuomioja",
        "1 EVEN Ralf Törngren \n2 TYPE Suomen 38. pääministeri\n2 DATE 5 MAY 1954\n2 NOTE https://fi.wikipedia.org/wiki/Ralf_T%C3%B6rngren",
        "1 EVEN Urho Kekkonen \n2 TYPE Suomen 39. pääministeri\n2 DATE 20 OCT 1954\n2 NOTE https://fi.wikipedia.org/wiki/Urho_Kekkonen",
        "1 EVEN K. A. Fagerholm \n2 TYPE Suomen 40. pääministeri\n2 DATE 3 MAR 1956\n2 NOTE https://fi.wikipedia.org/wiki/K.-A._Fagerholm",
        "1 EVEN V. J. Sukselainen \n2 TYPE Suomen 41. pääministeri\n2 DATE 27 MAY 1957\n2 NOTE https://fi.wikipedia.org/wiki/V._J._Sukselainen",
        "1 EVEN Rainer von Fieandt \n2 TYPE Suomen 42. pääministeri\n2 DATE 29 NOV 1957\n2 NOTE https://fi.wikipedia.org/wiki/Rainer_von_Fieandt",
        "1 EVEN Reino Kuuskoski \n2 TYPE Suomen 43. pääministeri\n2 DATE 26 APR 1958\n2 NOTE https://fi.wikipedia.org/wiki/Reino_Kuuskoski",
        "1 EVEN K.-A. Fagerholm \n2 TYPE Suomen 44. pääministeri\n2 DATE 29 AUG 1958\n2 NOTE https://fi.wikipedia.org/wiki/K.-A._Fagerholm",
        "1 EVEN V. J. Sukselainen \n2 TYPE Suomen 45. pääministeri\n2 DATE 13 JAN 1959\n2 NOTE https://fi.wikipedia.org/wiki/V._J._Sukselainen",
        "1 EVEN Martti Miettunen \n2 TYPE Suomen 46. pääministeri\n2 DATE 14 JUL 1961\n2 NOTE https://fi.wikipedia.org/wiki/Martti_Miettunen",
        "1 EVEN Ahti Karjalainen \n2 TYPE Suomen 47. pääministeri\n2 DATE 13 APR 1962\n2 NOTE https://fi.wikipedia.org/wiki/Ahti_Karjalainen",
        "1 EVEN Reino R. Lehto \n2 TYPE Suomen 48. pääministeri\n2 DATE 18 DEC 1963\n2 NOTE https://fi.wikipedia.org/wiki/Reino_R._Lehto",
        "1 EVEN Johannes Virolainen \n2 TYPE Suomen 49. pääministeri\n2 DATE 12 SEP 1964\n2 NOTE https://fi.wikipedia.org/wiki/Johannes_Virolainen",
        "1 EVEN Rafael Paasio \n2 TYPE Suomen 50. pääministeri\n2 DATE 27 MAY 1966\n2 NOTE https://fi.wikipedia.org/wiki/Rafael_Paasio",
        "1 EVEN Mauno Koivisto \n2 TYPE Suomen 51. pääministeri\n2 DATE 22 MAR 1968\n2 NOTE https://fi.wikipedia.org/wiki/Mauno_Koivisto",
        "1 EVEN Teuvo Aura \n2 TYPE Suomen 52. pääministeri\n2 DATE 14 MAY 1970\n2 NOTE https://fi.wikipedia.org/wiki/Teuvo_Aura",
        "1 EVEN Ahti Karjalainen \n2 TYPE Suomen 53. pääministeri\n2 DATE 15 AUG 1970\n2 NOTE https://fi.wikipedia.org/wiki/Ahti_Karjalainen",
        "1 EVEN Teuvo Aura \n2 TYPE Suomen 54. pääministeri\n2 DATE 29 OCT 1971\n2 NOTE https://fi.wikipedia.org/wiki/Teuvo_Aura",
        "1 EVEN Rafael Paasio \n2 TYPE Suomen 55. pääministeri\n2 DATE 23 FEB 1972\n2 NOTE https://fi.wikipedia.org/wiki/Rafael_Paasio",
        "1 EVEN Kalevi Sorsa \n2 TYPE Suomen 56. pääministeri\n2 DATE 4 SEP 1972\n2 NOTE https://fi.wikipedia.org/wiki/Kalevi_Sorsa",
        "1 EVEN Keijo Liinamaa \n2 TYPE Suomen 57. pääministeri\n2 DATE 13 JUL 1975\n2 NOTE https://fi.wikipedia.org/wiki/Keijo_Liinamaa",
        "1 EVEN Martti Miettunen \n2 TYPE Suomen 58. ja 59. pääministeri\n2 DATE 30 NOV 1975\n2 NOTE https://fi.wikipedia.org/wiki/Martti_Miettunen",
        "1 EVEN Kalevi Sorsa \n2 TYPE Suomen 60. pääministeri\n2 DATE 15 MAY 1977\n2 NOTE https://fi.wikipedia.org/wiki/Kalevi_Sorsa",
        "1 EVEN Mauno Koivisto \n2 TYPE Suomen 61. pääministeri\n2 DATE 26 MAY 1979\n2 NOTE https://fi.wikipedia.org/wiki/Mauno_Koivisto",
        "1 EVEN Kalevi Sorsa \n2 TYPE Suomen 62. ja 63. pääministeri\n2 DATE 19 FEB 1982\n2 NOTE https://fi.wikipedia.org/wiki/Kalevi_Sorsa",
        "1 EVEN Harri Holkeri \n2 TYPE Suomen 64. pääministeri\n2 DATE 30 APR 1987\n2 NOTE https://fi.wikipedia.org/wiki/Harri_Holkeri",
        "1 EVEN Esko Aho \n2 TYPE Suomen 65. pääministeri\n2 DATE 26 APR 1991\n2 NOTE https://fi.wikipedia.org/wiki/Esko_Aho",
        "1 EVEN Paavo Lipponen \n2 TYPE Suomen 66. ja 67. pääministeri\n2 DATE 13 APR 1995\n2 NOTE https://fi.wikipedia.org/wiki/Paavo_Lipponen",
        "1 EVEN Anneli Jäätteenmäki \n2 TYPE Suomen 68. pääministeri\n2 DATE 17 APR 2003\n2 NOTE https://fi.wikipedia.org/wiki/Anneli_J%C3%A4%C3%A4tteenm%C3%A4ki",
        "1 EVEN Matti Vanhanen \n2 TYPE Suomen 69. ja 70. pääministeri\n2 DATE 24 JUN 2003\n2 NOTE https://fi.wikipedia.org/wiki/Matti_Vanhanen",
        "1 EVEN Mari Kiviniemi \n2 TYPE Suomen 71. pääministeri\n2 DATE 22 JUN 2010\n2 NOTE https://fi.wikipedia.org/wiki/Mari_Kiviniemi",
        "1 EVEN Jyrki Katainen \n2 TYPE Suomen 72. pääministeri\n2 DATE 22 JUN 2011\n2 NOTE https://fi.wikipedia.org/wiki/Jyrki_Katainen",
        "1 EVEN Alexander Stubb \n2 TYPE Suomen 73. pääministeri\n2 DATE 24 JUN 2014\n2 NOTE https://fi.wikipedia.org/wiki/Alexander_Stubb",
        "1 EVEN Juha Sipilä \n2 TYPE Suomen 74. pääministeri\n2 DATE 29 MAY 2015\n2 NOTE https://fi.wikipedia.org/wiki/Juha_Sipil%C3%A4",
        "1 EVEN Antti Rinne \n2 TYPE Suomen 75. pääministeri\n2 DATE 6 JUN 2019\n2 NOTE https://fi.wikipedia.org/wiki/Antti_Rinne",
        "1 EVEN Sanna Marin \n2 TYPE Suomen 76. pääministeri\n2 DATE 10 DEC 2019\n2 NOTE https://fi.wikipedia.org/wiki/Sanna_Marin",
// Itsenäisyyden ajan tapahtumat		
        "1 EVEN Suomen itsenäisyysjulistus \n2 TYPE Suomen itsenäistyminen\n2 DATE 6 DEC 1917\n2 NOTE https://fi.wikipedia.org/wiki/Suomen_itsen%C3%A4istyminen",
        "1 EVEN Suomen sisällissota\n2 TYPE Sisällissota\n2 DATE 28 JAN 1918\n2 NOTE https://fi.wikipedia.org/wiki/Suomen_sis%C3%A4llissota",
        "1 EVEN Tarton rauha\n2 TYPE Tarton rauhansopimus\n2 DATE 14 NOV 1920\n2 NOTE https://fi.wikipedia.org/wiki/Tarton_rauha",
        "1 EVEN Suomen talvisota alkoi\n2 TYPE Talvisota\n2 DATE 30 NOV 1939\n2 NOTE https://fi.wikipedia.org/wiki/Talvisota",
        "1 EVEN Suomen talvisota päättyi\n2 TYPE Talvisota\n2 DATE 13 MAR 1940\n2 NOTE https://fi.wikipedia.org/wiki/Talvisota",
        "1 EVEN Suomen jatkosota alkoi\n2 TYPE Jatkosota\n2 DATE 25 JUN 1941\n2 NOTE https://fi.wikipedia.org/wiki/Jatkosota",
        "1 EVEN Suomen jatkosota päättyi\n2 TYPE Jatkosota\n2 DATE 19 SEP 1944\n2 NOTE https://fi.wikipedia.org/wiki/Jatkosota",
        "1 EVEN Suomen Lapin sota alkoi\n2 TYPE Lapin sota\n2 DATE 15 SEP 1944\n2 NOTE https://fi.wikipedia.org/wiki/Lapin_sota",
        "1 EVEN Suomen Lapin sota päättyi\n2 TYPE Lapin sota\n2 DATE 27 APR 1945\n2 NOTE https://fi.wikipedia.org/wiki/Lapin_sota",
        ]);
    }
    
};
