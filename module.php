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

use Fisharebest\Webtrees\Registry;
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

    public const CUSTOM_WEBSITE = 'https://github.com/ardhtu/finnish-historical-facts';

    public const CUSTOM_VERSION = '1.0.0.5';

    public const CUSTOM_LAST = 'https://github.com/ardhtu/finnish-historical-facts';

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
        return I18N::translate('Historical facts (in Finnish) - p狎ministerit, presidentit, suuriruhtinaat ja kuninkaat');
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
     *      2 NOTE <comment or [wikipedia fi](<link>)>
     *
     * @return Collection<string>
     */

    public function historicEventsAll(string $language_tag): Collection
// public function historicEventsAll(): Collection
    {
        $eventTypeR = I18N::translate('Ruotsin kuningas/kuningatar');
        $eventTypeV = I18N::translate('Ven채j채n Tsaari, Suomen suuriruhtinas');
        $eventTypep = I18N::translate('presidentti');
        $eventSubtypeA = I18N::translate('acting');

    /**
     * tbd: wikipedia should be selected based on the language of the webtrees user if the following pages exist in his wikipedia language version
     */
        $wikipedia  = "fi";

        return new Collection([
// Ruotsin kuninkaat, Kings of Sweden:
        "1 EVEN Kustaa I Vaasa (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE FROM 6 JUN 1523 TO 29 SEP 1560\n2 NOTE https://fi.wikipedia.org/wiki/Kustaa_Vaasa",
        "1 EVEN Eerik XIV (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE FROM 29 SEP 1560 TO 29 SEP 1568\n2 NOTE https://fi.wikipedia.org/wiki/Eerik_XIV",
        "1 EVEN Juhana III (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE FROM 29 SEP 1568 TO 17 NOV 1592\n2 NOTE https://fi.wikipedia.org/wiki/Juhana_III",
        "1 EVEN Sigismund (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE FROM 17 NOV 1592 TO 24 JUL 1599\n2 NOTE https://fi.wikipedia.org/wiki/Sigismund",
        "1 EVEN Kaarle IX (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE FROM 24 JUL 1599 TO 30 OCT 1611\n2 NOTE https://fi.wikipedia.org/wiki/Kaarle_IX",
        "1 EVEN Kustaa II Aadolf (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE FROM 30 OCT 1611 TO 6 NOV 1632\n2 NOTE https://fi.wikipedia.org/wiki/Kustaa_II_Aadolf",
        "1 EVEN Kristiina (Ruotsi)\n2 TYPE Ruotsin kuningatar\n2 DATE FROM 6 NOV 1632 TO 6 JUN 1654\n2 NOTE https://fi.wikipedia.org/wiki/Kristiina",
        "1 EVEN Kaarle X Kustaa (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE FROM 6 JUN 1654 TO 13 FEB 1660\n2 NOTE https://fi.wikipedia.org/wiki/Kaarle_X_Kustaa",
        "1 EVEN Kaarle XI (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE FROM 13 FEB 1660 TO 5 MAR 1697\n2 NOTE https://fi.wikipedia.org/wiki/Kaarle_XI",
        "1 EVEN Kaarle XII (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE FROM 5 MAR 1697 TO 2 APR 1719\n2 NOTE https://fi.wikipedia.org/wiki/Kaarle_XII",
        "1 EVEN Ulrika Eleonora (Ruotsi)\n2 TYPE Ruotsin kuningatar\n2 DATE FROM 2 APR 1719 TO 4 APR 1720\n2 NOTE https://fi.wikipedia.org/wiki/Ulrika_Eleonora",
        "1 EVEN Fredrik I (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE FROM 4 APR 1720 TO 5 APR 1751\n2 NOTE https://fi.wikipedia.org/wiki/Fredrik_I_(Ruotsi)",
        "1 EVEN Aadolf Fredrik (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE FROM 5 APR 1751 TO 12 FEB 1771\n2 NOTE https://fi.wikipedia.org/wiki/Aadolf_Fredrik",
        "1 EVEN Kustaa III (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE FROM 12 FEB 1771 TO 29 MAR 1792\n2 NOTE https://fi.wikipedia.org/wiki/Kustaa_III",
        "1 EVEN Kustaa IV Aadolf (Ruotsi)\n2 TYPE Ruotsin kuningas\n2 DATE FROM 29 MAR 1792 TO 17 SEP 1809\n2 NOTE https://fi.wikipedia.org/wiki/Kustaa_IV_Aadolf",
// Suuriruhtinaat, Ven채j채n keisarit, Great Dutches, Russian Emperors:
        "1 EVEN Aleksanteri I (Ven채j채)\n2 TYPE Ven채j채n Tsaari, Suomen suuriruhtinas\n2 DATE FROM 24 MAR 1801 TO 26 DEC 1821\n2 NOTE https://fi.wikipedia.org/wiki/Aleksanteri_I",
        "1 EVEN Nikolai I (Ven채j채)\n2 TYPE Ven채j채n Tsaari, Suomen suuriruhtinas\n2 DATE FROM 26 DEC 1821 TO 2 MAR 1855\n2 NOTE https://fi.wikipedia.org/wiki/Nikolai_I",
        "1 EVEN Aleksanteri II (Ven채j채)\n2 TYPE Ven채j채n Tsaari, Suomen suuriruhtinas\n2 DATE FROM 2 MAR 1855 TO 13 MAR 1881\n2 NOTE https://fi.wikipedia.org/wiki/Aleksanteri_II_(Ven%C3%A4j%C3%A4)",
        "1 EVEN Aleksanteri III (Ven채j채)\n2 TYPE Ven채j채n Tsaari, Suomen suuriruhtinas\n2 DATE FROM 13 MAR 1881 TO 1 NOV 1894\n2 NOTE https://fi.wikipedia.org/wiki/Aleksanteri_III_(Ven%C3%A4j%C3%A4)",
        "1 EVEN Nikolai II (Ven채j채)\n2 TYPE Ven채j채n Tsaari, Suomen suuriruhtinas\n2 DATE FROM 1 NOV 1894 TO 25 MAY 1918\n2 NOTE https://fi.wikipedia.org/wiki/Nikolai_II",
// Valtionhoitajat, Suomen kuningashanke
        "1 EVEN P. E. Svinhufvud \n2 TYPE Suomen 1. valtionhoitaja\n2 DATE FROM 25 MAY 1918 TO 12 DEC 1918\n2 NOTE https://fi.wikipedia.org/wiki/P._E._Svinhufvud",
        "1 EVEN Friedrich Karl eli V채in철 I (Saksa)\n2 TYPE Suomen kuningas\n2 DATE FROM 9 OCT 1918 TO 12 DEC 1918\n2 NOTE https://fi.wikipedia.org/wiki/Friedrich_Karl",
        "1 EVEN Carl Gustaf Emil Mannerheim \n2 TYPE Suomen 2. valtionhoitaja\n2 DATE FROM 12 DEC 1918 TO 25 JUL 1919\n2 NOTE https://fi.wikipedia.org/wiki/Carl_Gustaf_Emil_Mannerheim",
// Presidentit
        "1 EVEN K. J. St책hlberg \n2 TYPE Suomen 1. presidentti\n2 DATE FROM 25 JUL 1919 TO 2 MAR 1925\n2 NOTE https://fi.wikipedia.org/wiki/K._J._St%C3%A5hlberg",
        "1 EVEN Lauri Kristian Relander \n2 TYPE Suomen 2. presidentti\n2 DATE FROM 2 MAR 1925 TO 2 MAR 1931\n2 NOTE https://fi.wikipedia.org/wiki/Lauri_Kristian_Relander",
        "1 EVEN P. E. Svinhufvud \n2 TYPE Suomen 3. presidentti\n2 DATE FROM 2 MAR 1931 TO 1 MAR 1937\n2 NOTE https://fi.wikipedia.org/wiki/P._E._Svinhufvud",
        "1 EVEN Ky철sti Kallio \n2 TYPE Suomen 4. presidentti\n2 DATE FROM 1 MAR 1937 TO 19 DEC 1940\n2 NOTE https://fi.wikipedia.org/wiki/Ky%C3%B6sti_Kallio",
        "1 EVEN Risto Ryti \n2 TYPE Suomen 5. presidentti\n2 DATE FROM 19 DEC 1940 TO DATE 4 AUG 1944\n2 NOTE https://fi.wikipedia.org/wiki/Risto_Ryti",
        "1 EVEN Carl Gustaf Emil Mannerheim \n2 TYPE Suomen 6. presidentti\n2 DATE FROM 4 AUG 1944 TO 11 MAR 1946\n2 NOTE https://fi.wikipedia.org/wiki/Carl_Gustaf_Emil_Mannerheim",
        "1 EVEN J. K. Paasikivi \n2 TYPE Suomen 7. presidentti\n2 DATE FROM 11 MAR 1946 TO 1 MAR 1956\n2 NOTE https://fi.wikipedia.org/wiki/J._K._Paasikivi",
        "1 EVEN Urho Kekkonen \n2 TYPE Suomen 8. presidentti\n2 DATE FROM 1 MAR 1956 TO 27 JAN 1982\n2 NOTE https://fi.wikipedia.org/wiki/Urho_Kekkonen",
        "1 EVEN Mauno Koivisto \n2 TYPE Suomen 9. presidentti\n2 DATE FROM 27 JAN 1982 TO 1 MAR 1994\n2 NOTE https://fi.wikipedia.org/wiki/Mauno_Koivisto",
        "1 EVEN Martti Ahtisaari \n2 TYPE Suomen 10. presidentti\n2 DATE FROM 1 MAR 1994 TO 1 MAR 2000\n2 NOTE https://fi.wikipedia.org/wiki/Martti_Ahtisaari",
        "1 EVEN Tarja Halonen \n2 TYPE Suomen 11. presidentti\n2 DATE FROM 1 MAR 2000 TO 1 MAR 2012\n2 NOTE https://fi.wikipedia.org/wiki/Tarja_Halonen",
        "1 EVEN Sauli Niinist철 \n2 TYPE Suomen 12. presidentti\n2 DATE FROM 1 MAR 2012 TO 1 MAR 2024\n2 NOTE https://fi.wikipedia.org/wiki/Sauli_Niinist%C3%B6",
        "1 EVEN Alexander Stubb \n2 TYPE Suomen 13. presidentti\n2 DATE 1 MAR 2024\n2 NOTE https://fi.wikipedia.org/wiki/Alexander_Stubb",
// P채채ministerit
        "1 EVEN P. E. Svinhufvud \n2 TYPE Suomen 1. p채채ministeri\n2 DATE FROM 27 NOV 1917 TO 27 MAY 1918\n2 NOTE https://fi.wikipedia.org/wiki/P._E._Svinhufvud",
        "1 EVEN J. K. Paasikivi \n2 TYPE Suomen 2. p채채ministeri\n2 DATE FROM 27 MAY 1918 TO 27 NOV 1918\\n2 NOTE https://fi.wikipedia.org/wiki/J._K._Paasikivi",
        "1 EVEN Lauri Ingman \n2 TYPE Suomen 3. p채채ministeri\n2 DATE FROM 27 NOV 1918 TO 17 APR 1919\n2 NOTE https://fi.wikipedia.org/wiki/Lauri_Ingman",
        "1 EVEN Kaarlo Castr챕n \n2 TYPE Suomen 4. p채채ministeri\n2 DATE FROM 17 APR 1919 TO 15 AUG 1919\n2 NOTE https://fi.wikipedia.org/wiki/Kaarlo_Castr%C3%A9n",
        "1 EVEN J. H. Vennola \n2 TYPE Suomen 5. p채채ministeri\n2 DATE FROM 15 AUG 1919 TO 15 MAR 1920\n2 NOTE https://fi.wikipedia.org/wiki/J._H._Vennola",
        "1 EVEN Rafael Erich \n2 TYPE Suomen 6. p채채ministeri\n2 DATE FROM 15 MAR 1920 TO 9 APR 1921\n2 NOTE https://fi.wikipedia.org/wiki/Rafael_Erich",
        "1 EVEN J. H. Vennola \n2 TYPE Suomen 7. p채채ministeri\n2 DATE FROM 9 APR 1921 TO 2 JUN 1922\n2 NOTE https://fi.wikipedia.org/wiki/J._H._Vennola",
        "1 EVEN A. K. Cajander \n2 TYPE Suomen 8. p채채ministeri\n2 DATE FROM 2 JUN 1922 TO 14 NOV 1922\n2 NOTE https://fi.wikipedia.org/wiki/A._K._Cajander",
        "1 EVEN Ky철sti Kallio \n2 TYPE Suomen 9. p채채ministeri\n2 DATE FROM 14 NOV 1922 TO 19 JAN 1924\n2 NOTE https://fi.wikipedia.org/wiki/Ky%C3%B6sti_Kallio",
        "1 EVEN A. K. Cajander \n2 TYPE Suomen 10. p채채ministeri\n2 DATE FROM 19 JAN 1924 TO 31 MAY 1924\n2 NOTE https://fi.wikipedia.org/wiki/A._K._Cajander",
        "1 EVEN Lauri Ingman \n2 TYPE Suomen 11. p채채ministeri\n2 DATE FROM 31 MAY 1924 TO 31 MAR 1925\n2 NOTE https://fi.wikipedia.org/wiki/Lauri_Ingman",
        "1 EVEN Antti Tulenheimo \n2 TYPE Suomen 12. p채채ministeri\n2 DATE FROM 31 MAR 1925 TO 31 DEC 1925\n2 NOTE https://fi.wikipedia.org/wiki/Antti_Tulenheimo",
        "1 EVEN Ky철sti Kallio \n2 TYPE Suomen 13. p채채ministeri\n2 DATE FROM 31 DEC 1925 TO 13 DEC 1926\n2 NOTE https://fi.wikipedia.org/wiki/Ky%C3%B6sti_Kallio",
        "1 EVEN V채in철 Tanner \n2 TYPE Suomen 14. p채채ministeri\n2 DATE FROM 13 DEC 1926 TO 17 DEC 1927\n2 NOTE https://fi.wikipedia.org/wiki/V%C3%A4in%C3%B6_Tanner",
        "1 EVEN Juho Sunila \n2 TYPE Suomen 15. p채채ministeri\n2 DATE FROM 17 DEC 1927 TO 22 DEC 1928\n2 NOTE https://fi.wikipedia.org/wiki/Juho_Sunila",
        "1 EVEN Oskari Mantere \n2 TYPE Suomen 16. p채채ministeri\n2 DATE FROM 22 DEC 1928 TO 16 AUG 1929\n2 NOTE https://fi.wikipedia.org/wiki/Oskari_Mantere",
        "1 EVEN Ky철sti Kallio \n2 TYPE Suomen 17. p채채ministeri\n2 DATE FROM 16 AUG 1929 TO 4 JUL 1930\n2 NOTE https://fi.wikipedia.org/wiki/Ky%C3%B6sti_Kallio",
        "1 EVEN P. E. Svinhufvud \n2 TYPE Suomen 18. p채채ministeri\n2 DATE FROM 4 JUL 1930 TO 21 MAR 1931\n2 NOTE https://fi.wikipedia.org/wiki/P._E._Svinhufvud",
        "1 EVEN Juho Sunila \n2 TYPE Suomen 19. p채채ministeri\n2 DATE FROM 21 MAR 1931 TO 14 DEC 1932\n2 NOTE https://fi.wikipedia.org/wiki/Juho_Sunila",
        "1 EVEN Toivo Kivim채ki \n2 TYPE Suomen 20. p채채ministeri\n2 DATE FROM 14 DEC 1932 TO 7 OCT 1936\n2 NOTE https://fi.wikipedia.org/wiki/Toivo_Kivim%C3%A4ki",
        "1 EVEN Ky철sti Kallio \n2 TYPE Suomen 21. p채채ministeri\n2 DATE FROM 7 OCT 1936 TO 12 MAR 1937\n2 NOTE https://fi.wikipedia.org/wiki/Ky%C3%B6sti_Kallio",
        "1 EVEN A. K. Cajander \n2 TYPE Suomen 22. p채채ministeri\n2 DATE FROM 12 MAR 1937 TO 1 DEC 1939\n2 NOTE https://fi.wikipedia.org/wiki/A._K._Cajander",
        "1 EVEN Risto Ryti \n2 TYPE Suomen 23. ja 24. p채채ministeri\n2 DATE FROM 1 DEC 1939 TO 3 JAN 1941\n2 NOTE https://fi.wikipedia.org/wiki/Risto_Ryti",
        "1 EVEN Jukka Rangell \n2 TYPE Suomen 25. p채채ministeri\n2 DATE FROM 3 JAN 1941 TO 5 MAR 1943\n2 NOTE https://fi.wikipedia.org/wiki/Jukka_Rangell",
        "1 EVEN Edwin Linkomies \n2 TYPE Suomen 26. p채채ministeri\n2 DATE FROM 5 MAR 1943 TO 8 AUG 1944\n2 NOTE https://fi.wikipedia.org/wiki/Edwin_Linkomies",
        "1 EVEN Antti Hackzell \n2 TYPE Suomen 27. p채채ministeri\n2 DATE FROM 8 AUG 1944 TO 21 SEP 1944\n2 NOTE https://fi.wikipedia.org/wiki/Antti_Hackzell",
        "1 EVEN Urho Castr챕n \n2 TYPE Suomen 28. p채채ministeri\n2 DATE FROM 21 SEP 1944 TO 17 NOV 1944\n2 NOTE https://fi.wikipedia.org/wiki/Urho_Castr%C3%A9n",
        "1 EVEN J. K. Paasikivi \n2 TYPE Suomen 29. ja 30. p채채ministeri\n2 DATE FROM 17 NOV 1944 TO 26 MAR 1946\n2 NOTE https://fi.wikipedia.org/wiki/J._K._Paasikivi",
        "1 EVEN Mauno Pekkala \n2 TYPE Suomen 31. p채채ministeri\n2 DATE FROM 26 MAR 1946 TO 29 JUL 1948\n2 NOTE https://fi.wikipedia.org/wiki/Mauno_Pekkala",
        "1 EVEN K. A. Fagerholm \n2 TYPE Suomen 32. p채채ministeri\n2 DATE FROM 29 JUL 1948 TO 17 MAR 1950\n2 NOTE https://fi.wikipedia.org/wiki/K.-A._Fagerholm",
        "1 EVEN Urho Kekkonen \n2 TYPE Suomen 33., 34., 35. ja 36. p채채ministeri\n2 DATE FROM 17 MAR 1950 TO 17 NOV 1953\n2 NOTE https://fi.wikipedia.org/wiki/Urho_Kekkonen",
        "1 EVEN Sakari Tuomioja \n2 TYPE Suomen 37. p채채ministeri\n2 DATE FROM 17 NOV 1953 TO 5 MAY 1954\n2 NOTE https://fi.wikipedia.org/wiki/Sakari_Tuomioja",
        "1 EVEN Ralf T철rngren \n2 TYPE Suomen 38. p채채ministeri\n2 DATE FROM 5 MAY 1954 TO 20 OCT 1954\n2 NOTE https://fi.wikipedia.org/wiki/Ralf_T%C3%B6rngren",
        "1 EVEN Urho Kekkonen \n2 TYPE Suomen 39. p채채ministeri\n2 DATE FROM 20 OCT 1954 TO 3 MAR 1956\n2 NOTE https://fi.wikipedia.org/wiki/Urho_Kekkonen",
        "1 EVEN K. A. Fagerholm \n2 TYPE Suomen 40. p채채ministeri\n2 DATE FROM 3 MAR 1956 TO 27 MAY 1957\n2 NOTE https://fi.wikipedia.org/wiki/K.-A._Fagerholm",
        "1 EVEN V. J. Sukselainen \n2 TYPE Suomen 41. p채채ministeri\n2 DATE FROM 27 MAY 1957 TO 29 NOV 1957\n2 NOTE https://fi.wikipedia.org/wiki/V._J._Sukselainen",
        "1 EVEN Rainer von Fieandt \n2 TYPE Suomen 42. p채채ministeri\n2 DATE FROM 29 NOV 1957 TO 26 APR 1958\n2 NOTE https://fi.wikipedia.org/wiki/Rainer_von_Fieandt",
        "1 EVEN Reino Kuuskoski \n2 TYPE Suomen 43. p채채ministeri\n2 DATE FROM 26 APR 1958 TO 29 AUG 1958\n2 NOTE https://fi.wikipedia.org/wiki/Reino_Kuuskoski",
        "1 EVEN K.-A. Fagerholm \n2 TYPE Suomen 44. p채채ministeri\n2 DATE 29 FROM AUG 1958 TO 13 JAN 1959\n2 NOTE https://fi.wikipedia.org/wiki/K.-A._Fagerholm",
        "1 EVEN V. J. Sukselainen \n2 TYPE Suomen 45. p채채ministeri\n2 DATE FROM 13 JAN 1959 TO 14 JUL 1961\n2 NOTE https://fi.wikipedia.org/wiki/V._J._Sukselainen",
        "1 EVEN Martti Miettunen \n2 TYPE Suomen 46. p채채ministeri\n2 DATE FROM 14 JUL 1961 TO 13 APR 1962\n2 NOTE https://fi.wikipedia.org/wiki/Martti_Miettunen",
        "1 EVEN Ahti Karjalainen \n2 TYPE Suomen 47. p채채ministeri\n2 DATE FROM 13 APR 1962 TO 18 DEC 1963\n2 NOTE https://fi.wikipedia.org/wiki/Ahti_Karjalainen",
        "1 EVEN Reino R. Lehto \n2 TYPE Suomen 48. p채채ministeri\n2 DATE FROM 18 DEC 1963 TO 12 SEP 1964\n2 NOTE https://fi.wikipedia.org/wiki/Reino_R._Lehto",
        "1 EVEN Johannes Virolainen \n2 TYPE Suomen 49. p채채ministeri\n2 DATE FROM 12 SEP 1964 TO 27 MAY 1966\n2 NOTE https://fi.wikipedia.org/wiki/Johannes_Virolainen",
        "1 EVEN Rafael Paasio \n2 TYPE Suomen 50. p채채ministeri\n2 DATE FROM 27 MAY 1966 TO 22 MAR 1968\n2 NOTE https://fi.wikipedia.org/wiki/Rafael_Paasio",
        "1 EVEN Mauno Koivisto \n2 TYPE Suomen 51. p채채ministeri\n2 DATE FROM 22 MAR 1968 TO 14 MAY 1970\n2 NOTE https://fi.wikipedia.org/wiki/Mauno_Koivisto",
        "1 EVEN Teuvo Aura \n2 TYPE Suomen 52. p채채ministeri\n2 DATE FROM 14 MAY 1970 TO 15 AUG 1970\n2 NOTE https://fi.wikipedia.org/wiki/Teuvo_Aura",
        "1 EVEN Ahti Karjalainen \n2 TYPE Suomen 53. p채채ministeri\n2 DATE FROM 15 AUG 1970 TO 29 OCT 1971\n2 NOTE https://fi.wikipedia.org/wiki/Ahti_Karjalainen",
        "1 EVEN Teuvo Aura \n2 TYPE Suomen 54. p채채ministeri\n2 DATE FROM 29 OCT 1971 TO 23 FEB 1972\n2 NOTE https://fi.wikipedia.org/wiki/Teuvo_Aura",
        "1 EVEN Rafael Paasio \n2 TYPE Suomen 55. p채채ministeri\n2 DATE FROM 23 FEB 1972 TO 4 SEP 1972\n2 NOTE https://fi.wikipedia.org/wiki/Rafael_Paasio",
        "1 EVEN Kalevi Sorsa \n2 TYPE Suomen 56. p채채ministeri\n2 DATE FROM 4 SEP 1972 TO 13 JUL 1975\n2 NOTE https://fi.wikipedia.org/wiki/Kalevi_Sorsa",
        "1 EVEN Keijo Liinamaa \n2 TYPE Suomen 57. p채채ministeri\n2 DATE FROM 13 JUL 1975 TO 30 NOV 1975\n2 NOTE https://fi.wikipedia.org/wiki/Keijo_Liinamaa",
        "1 EVEN Martti Miettunen \n2 TYPE Suomen 58. ja 59. p채채ministeri\n2 DATE FROM 30 NOV 1975 TO 15 MAY 1977\n2 NOTE https://fi.wikipedia.org/wiki/Martti_Miettunen",
        "1 EVEN Kalevi Sorsa \n2 TYPE Suomen 60. p채채ministeri\n2 DATE FROM 15 MAY 1977 TO 26 MAY 1979\n2 NOTE https://fi.wikipedia.org/wiki/Kalevi_Sorsa",
        "1 EVEN Mauno Koivisto \n2 TYPE Suomen 61. p채채ministeri\n2 DATE FROM 26 MAY 1979 TO 19 FEB 1982\n2 NOTE https://fi.wikipedia.org/wiki/Mauno_Koivisto",
        "1 EVEN Kalevi Sorsa \n2 TYPE Suomen 62. ja 63. p채채ministeri\n2 DATE FROM 19 FEB 1982 TO 30 APR 1987\n2 NOTE https://fi.wikipedia.org/wiki/Kalevi_Sorsa",
        "1 EVEN Harri Holkeri \n2 TYPE Suomen 64. p채채ministeri\n2 DATE FROM 30 APR 1987 TO 26 APR 1991\n2 NOTE https://fi.wikipedia.org/wiki/Harri_Holkeri",
        "1 EVEN Esko Aho \n2 TYPE Suomen 65. p채채ministeri\n2 DATE FROM 26 APR 1991 TO 13 APR 1995\n2 NOTE https://fi.wikipedia.org/wiki/Esko_Aho",
        "1 EVEN Paavo Lipponen \n2 TYPE Suomen 66. ja 67. p채채ministeri\n2 DATE FROM 13 APR 1995 TO 17 APR 2003\n2 NOTE https://fi.wikipedia.org/wiki/Paavo_Lipponen",
        "1 EVEN Anneli J채채tteenm채ki \n2 TYPE Suomen 68. p채채ministeri\n2 DATE FROM 17 APR 2003 TO 24 JUN 2003\n2 NOTE https://fi.wikipedia.org/wiki/Anneli_J%C3%A4%C3%A4tteenm%C3%A4ki",
        "1 EVEN Matti Vanhanen \n2 TYPE Suomen 69. ja 70. p채채ministeri\n2 DATE FROM 24 JUN 2003 TO 22 JUN 2010\n2 NOTE https://fi.wikipedia.org/wiki/Matti_Vanhanen",
        "1 EVEN Mari Kiviniemi \n2 TYPE Suomen 71. p채채ministeri\n2 FROM DATE 22 JUN 2010 TO 22 JUN 2011\n2 NOTE https://fi.wikipedia.org/wiki/Mari_Kiviniemi",
        "1 EVEN Jyrki Katainen \n2 TYPE Suomen 72. p채채ministeri\n2 FROM DATE 22 JUN 2011 TO 24 JUN 2014\n2 NOTE https://fi.wikipedia.org/wiki/Jyrki_Katainen",
        "1 EVEN Alexander Stubb \n2 TYPE Suomen 73. p채채ministeri\n2 DATE FROM 24 JUN 2014 TO 29 MAY 2015\n2 NOTE https://fi.wikipedia.org/wiki/Alexander_Stubb",
        "1 EVEN Juha Sipil채 \n2 TYPE Suomen 74. p채채ministeri\n2 DATE FROM 29 MAY 2015 TO 6 JUN 2019\n2 NOTE https://fi.wikipedia.org/wiki/Juha_Sipil%C3%A4",
        "1 EVEN Antti Rinne \n2 TYPE Suomen 75. p채채ministeri\n2 DATE FROM 6 JUN 2019 TO 10 DEC 2019\n2 NOTE https://fi.wikipedia.org/wiki/Antti_Rinne",
        "1 EVEN Sanna Marin \n2 TYPE Suomen 76. p채채ministeri\n2 DATE FROM 10 DEC 2019 TO 20 JUN 2023\n2 NOTE https://fi.wikipedia.org/wiki/Sanna_Marin",
        "1 EVEN Petteri Orpo \n2 TYPE Suomen 77. p채채ministeri\n2 DATE 20 JUN 2023\n2 NOTE https://fi.wikipedia.org/wiki/Petteri_Orpo",
// Ruotsin ja Ven채j채n vallan ajan tapahtumat
        "1 EVEN Suomen sota alkoi\n2 TYPE Ruotsin - Ven채j채n sota\n2 DATE 21 FEB 1808\n2 NOTE https://fi.wikipedia.org/wiki/Suomen_sota",
        "1 EVEN Suomen sota p채채ttyi\n2 TYPE Ruotsin - Ven채j채n sota\n2 DATE 17 SEP 1809\n2 NOTE https://fi.wikipedia.org/wiki/Suomen_sota",
        "1 EVEN Krimin/Oolannin sota alkoi\n2 TYPE Ven채j채n sodat\n2 DATE 28 MAR 1854\n2 NOTE https://fi.wikipedia.org/wiki/Krimin_sota",
        "1 EVEN Krimin/Oolannin sota p채채ttyi\n2 TYPE Ven채j채n sodat\n2 DATE 30 MAR 1856\n2 NOTE https://fi.wikipedia.org/wiki/Krimin_sota",
        "1 EVEN Vuoden 1905 yleislakko alkoi\n2 TYPE Yleislakko\n2 DATE 29 OCT 1905\n2 NOTE https://fi.wikipedia.org/wiki/Vuoden_1905_suurlakko",
        "1 EVEN Vuoden 1905 yleislakko loppui\n2 TYPE Yleislakko\n2 DATE 6 NOV 1905\n2 NOTE https://fi.wikipedia.org/wiki/Vuoden_1905_suurlakko",
        "1 EVEN Vuoden 1917 yleislakko alkoi\n2 TYPE Yleislakko\n2 DATE 14 NOV 1917\n2 NOTE https://fi.wikipedia.org/wiki/Vuoden_1917_yleislakko",
        "1 EVEN Vuoden 1917 yleislakko loppui\n2 TYPE Yleislakko\n2 DATE 20 NOV 1917\n2 NOTE https://fi.wikipedia.org/wiki/Vuoden_1917_yleislakko",
// Itsen채isyyden ajan tapahtumat
        "1 EVEN Suomen itsen채isyysjulistus \n2 TYPE Suomen itsen채istyminen\n2 DATE 6 DEC 1917\n2 NOTE https://fi.wikipedia.org/wiki/Suomen_itsen%C3%A4istyminen",
        "1 EVEN Suomen sis채llissota\n2 TYPE Sis채llissota\n2 DATE 28 JAN 1918\n2 NOTE https://fi.wikipedia.org/wiki/Suomen_sis%C3%A4llissota",
        "1 EVEN Tarton rauha\n2 TYPE Tarton rauhansopimus\n2 DATE 14 NOV 1920\n2 NOTE https://fi.wikipedia.org/wiki/Tarton_rauha",
        "1 EVEN Suomen talvisota alkoi\n2 TYPE Talvisota\n2 DATE 30 NOV 1939\n2 NOTE https://fi.wikipedia.org/wiki/Talvisota",
        "1 EVEN Suomen talvisota p채채ttyi\n2 TYPE Talvisota\n2 DATE 13 MAR 1940\n2 NOTE https://fi.wikipedia.org/wiki/Talvisota",
        "1 EVEN Suomen jatkosota alkoi\n2 TYPE Jatkosota\n2 DATE 25 JUN 1941\n2 NOTE https://fi.wikipedia.org/wiki/Jatkosota",
        "1 EVEN Suomen jatkosota p채채ttyi\n2 TYPE Jatkosota\n2 DATE 19 SEP 1944\n2 NOTE https://fi.wikipedia.org/wiki/Jatkosota",
        "1 EVEN Suomen Lapin sota alkoi\n2 TYPE Lapin sota\n2 DATE 15 SEP 1944\n2 NOTE https://fi.wikipedia.org/wiki/Lapin_sota",
        "1 EVEN Suomen Lapin sota p채채ttyi\n2 TYPE Lapin sota\n2 DATE 27 APR 1945\n2 NOTE https://fi.wikipedia.org/wiki/Lapin_sota",
        "1 EVEN Vuoden 1956 yleislakko alkoi\n2 TYPE Yleislakko\n2 DATE 1 MAR 1956\n2 NOTE https://fi.wikipedia.org/wiki/Vuoden_1956_yleislakko",
        "1 EVEN Vuoden 1956 yleislakko loppui\n2 TYPE Yleislakko\n2 DATE 20 MAR 1956\n2 NOTE https://fi.wikipedia.org/wiki/Vuoden_1956_yleislakko",
        ]);
    }

};
