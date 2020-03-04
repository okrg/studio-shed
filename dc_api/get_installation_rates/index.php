<?php
include('../headers.php');
$model = $_REQUEST['model'];
$state = $_REQUEST['state'];
$length = $_REQUEST['length'];
$depth = $_REQUEST['depth'];
$zip =  $_REQUEST['zip'];

$area = $length*$depth;

//Use zip to determine Bay or Seattle status
$bay_area = array(94501,94502,94536,94537,94538,94539,94540,94541,94542,94543,94544,94545,94546,94546,94550,94551,94552,94552,94555,94557,94557,94560,94566,94568,94568,94577,94578,94579,94580,94586,94587,94588,94601,94602,94602,94603,94604,94605,94606,94607,94608,94608,94609,94610,94610,94611,94611,94612,94613,94614,94615,94617,94618,94618,94619,94620,94620,94621,94623,94624,94661,94662,94662,94701,94702,94703,94704,94705,94706,94706,94706,94707,94707,94708,94708,94709,94710,94710,94712,94922,94923,94926,94927,94928,94931,94951,94952,94953,94954,94955,94972,94975,94999,95401,95402,95403,95404,95405,95406,95407,95409,95412,95416,95419,95421,95425,95430,95431,95433,95436,95439,95441,95442,95444,95446,95448,95450,95452,95462,95465,95471,95472,95473,95476,95480,95486,95487,95492,95497,94510,94512,94533,94534,94534,94535,94535,94571,94585,94589,94589,94590,94591,94592,95620,95620,95625,95687,95688,95696,95696,95002,94040,95194,95008,95009,95011,95013,95014,95015,94303,95020,95021,95026,95044,95193,94022,94023,94024,94022,94024,95030,95031,95032,95035,95036,94035,94035,95030,95014,95037,95038,95140,94040,94035,94039,94040,94041,94042,94043,95042,94088,94301,94302,94303,94304,94305,94306,94309,95014,95044,95044,95101,95103,95106,95108,95109,95110,95111,95112,95113,95115,95116,95117,95118,95119,95120,95121,95122,95123,95124,95125,95126,95127,95128,95129,95130,95131,95132,95133,95134,95135,95136,95138,95139,95140,95141,95148,95150,95151,95152,95153,95154,95155,95156,95157,95158,95159,95160,95161,95164,95170,95172,95173,95190,95191,95192,95193,95194,95196,95190,95192,95196,95046,95050,95051,95052,95053,95054,95055,95056,95053,95070,95071,94305,94309,94085,94086,94087,94088,94089,94602,95012,94134,95023,94403,94402,94401,94404,94112,94107,94102,94303,94301,94089,89431,94074,94080,94066,94070,94062,94063,94065,94014,94013,94015,94018,94020,94019,94920,94021,94024,94025,94028,94027,94030,94553,94037,94038,94044,94060,94061,94541,97701,46123,21401,94002,94011,94005,94010,94924,94925,94920,94913,94904,94901,94903,94949,94948,94947,94946,94945,94037,94941,94558,94940,94939,94938,94563,94937,94933,94930,94929,94928,94970,94971,94972,95471,94960,94963,94703,94105,94964,94965,94705,94956,95476,94957,94950,94952,94953,90266,94973,95650,94102,94103,94104,94105,94107,94108,94109,94110,94111,94112,94114,94115,94116,94117,94118,94121,94122,94123,94124,94127,94129,94130,94131,94132,94133,94134,94158,94503,94508,94515,94558,94558,94559,94562,94567,94573,94574,94576,94576,94581,94599,94506,94507,94509,94511,94513,94514,94514,94516,94517,94518,94519,94520,94521,94522,94523,94523,94524,94525,94526,94527,94528,94530,94530,94531,94547,94547,94548,94549,94553,94553,94556,94561,94563,94564,94565,94565,94569,94570,94572,94575,94583,94595,94596,94597,94598,94801,94801,94801,94802,94803,94803,94804,94805,94806,94806,94806,94807,94808,94820,94820,94850);
$greater_seattle = array(98003,98005,98033,98037,98040,98052,98055,98101,98101,98102,98103,98103,98103,98104,98104,98105,98105,98107,98109,98109,98110,98110,98116,98116,98118,98121,98125,98144,98199);

if( in_array((int)$zip, $bay_area) ) {
  $state = 'CABA';
}

if( in_array((int)$zip, $greater_seattle) ) {
  $state = 'WAGS';
}
$install = new stdClass();
$install->signature = json_decode('{
"CO": { "ShellLE96": 2037.66, "LifestyleLE96": 5028.25, "ShellLE140": 21.23, "LifestyleLE140": 52.38, "ShellG140": 19.11, "LifestyleG140": 47.14 },
"AL": { "ShellLE96": 1644.7, "LifestyleLE96": 4209.19, "ShellLE140": 17.14, "LifestyleLE140": 43.85, "ShellG140": 15.41, "LifestyleG140": 39.46 },
"AK": { "ShellLE96": 2714.13, "LifestyleLE96": 6979.53, "ShellLE140": 28.28, "LifestyleLE140": 72.7, "ShellG140": 25.44, "LifestyleG140": 65.43 },
"AZ": { "ShellLE96": 1879.68, "LifestyleLE96": 4817.9, "ShellLE140": 19.58, "LifestyleLE140": 50.19, "ShellG140": 17.62, "LifestyleG140": 45.17 },
"AR": { "ShellLE96": 1644.7, "LifestyleLE96": 4209.19, "ShellLE140": 17.14, "LifestyleLE140": 43.85, "ShellG140": 15.41, "LifestyleG140": 39.46 },
"CA": { "ShellLE96": 2803.17, "LifestyleLE96": 6935.57, "ShellLE140": 29.2, "LifestyleLE140": 72.25, "ShellG140": 26.28, "LifestyleG140": 65.02 },
"CABA": { "ShellLE96": 2852.62, "LifestyleLE96": 7135.27, "ShellLE140": 29.71, "LifestyleLE140": 74.33, "ShellG140": 26.74, "LifestyleG140": 66.89 },
"CT": { "ShellLE96": 2269.2, "LifestyleLE96": 5826.93, "ShellLE140": 23.64, "LifestyleLE140": 60.7, "ShellG140": 21.27, "LifestyleG140": 54.63 },
"DE": { "ShellLE96": 1860.84, "LifestyleLE96": 4769.08, "ShellLE140": 19.38, "LifestyleLE140": 49.68, "ShellG140": 17.44, "LifestyleG140": 44.71 },
"FL": { "ShellLE96": 1948.25, "LifestyleLE96": 4995.54, "ShellLE140": 20.3, "LifestyleLE140": 52.04, "ShellG140": 18.27, "LifestyleG140": 46.83 },
"GA": { "ShellLE96": 1644.7, "LifestyleLE96": 4209.19, "ShellLE140": 17.14, "LifestyleLE140": 43.85, "ShellG140": 15.41, "LifestyleG140": 39.46 },
"HI": { "ShellLE96": 2645.57, "LifestyleLE96": 6801.92, "ShellLE140": 27.56, "LifestyleLE140": 70.85, "ShellG140": 24.8, "LifestyleG140": 63.77 },
"ID": { "ShellLE96": 1987.67, "LifestyleLE96": 5097.64, "ShellLE140": 20.71, "LifestyleLE140": 53.1, "ShellG140": 18.64, "LifestyleG140": 47.79 },
"IL": { "ShellLE96": 2266.45, "LifestyleLE96": 5819.8, "ShellLE140": 23.6, "LifestyleLE140": 60.62, "ShellG140": 21.25, "LifestyleG140": 54.56 },
"IN": { "ShellLE96": 1644.7, "LifestyleLE96": 4209.19, "ShellLE140": 17.14, "LifestyleLE140": 43.85, "ShellG140": 15.41, "LifestyleG140": 39.46 },
"IA": { "ShellLE96": 1644.7, "LifestyleLE96": 4209.19, "ShellLE140": 17.14, "LifestyleLE140": 43.85, "ShellG140": 15.41, "LifestyleG140": 39.46 },
"KS": { "ShellLE96": 1644.7, "LifestyleLE96": 4209.19, "ShellLE140": 17.14, "LifestyleLE140": 43.85, "ShellG140": 15.41, "LifestyleG140": 39.46 },
"KY": { "ShellLE96": 1644.7, "LifestyleLE96": 4209.19, "ShellLE140": 17.14, "LifestyleLE140": 43.85, "ShellG140": 15.41, "LifestyleG140": 39.46 },
"LA": { "ShellLE96": 1644.7, "LifestyleLE96": 4209.19, "ShellLE140": 17.14, "LifestyleLE140": 43.85, "ShellG140": 15.41, "LifestyleG140": 39.46 },
"ME": { "ShellLE96": 1952.83, "LifestyleLE96": 5007.4, "ShellLE140": 20.34, "LifestyleLE140": 52.16, "ShellG140": 18.31, "LifestyleG140": 46.94 },
"MD": { "ShellLE96": 2178.54, "LifestyleLE96": 5481.44, "ShellLE140": 22.69, "LifestyleLE140": 57.1, "ShellG140": 20.42, "LifestyleG140": 51.39 },
"MA": { "ShellLE96": 2303.94, "LifestyleLE96": 5916.94, "ShellLE140": 24, "LifestyleLE140": 61.63, "ShellG140": 21.6, "LifestyleG140": 55.47 },
"MI": { "ShellLE96": 1644.7, "LifestyleLE96": 4209.19, "ShellLE140": 17.14, "LifestyleLE140": 43.85, "ShellG140": 15.41, "LifestyleG140": 39.46 },
"MN": { "ShellLE96": 1778.34, "LifestyleLE96": 4555.38, "ShellLE140": 18.52, "LifestyleLE140": 47.45, "ShellG140": 16.67, "LifestyleG140": 42.71 },
"MS": { "ShellLE96": 1644.7, "LifestyleLE96": 4209.19, "ShellLE140": 17.14, "LifestyleLE140": 43.85, "ShellG140": 15.41, "LifestyleG140": 39.46 },
"MO": { "ShellLE96": 1644.7, "LifestyleLE96": 4209.19, "ShellLE140": 17.14, "LifestyleLE140": 43.85, "ShellG140": 15.41, "LifestyleG140": 39.46 },
"MT": { "ShellLE96": 1962.18, "LifestyleLE96": 5031.6, "ShellLE140": 20.44, "LifestyleLE140": 52.41, "ShellG140": 18.4, "LifestyleG140": 47.17 },
"NE": { "ShellLE96": 1644.7, "LifestyleLE96": 4209.19, "ShellLE140": 17.14, "LifestyleLE140": 43.85, "ShellG140": 15.41, "LifestyleG140": 39.46 },
"NV": { "ShellLE96": 2190.34, "LifestyleLE96": 5622.66, "ShellLE140": 22.82, "LifestyleLE140": 58.57, "ShellG140": 20.54, "LifestyleG140": 52.71 },
"NH": { "ShellLE96": 1921.64, "LifestyleLE96": 4926.59, "ShellLE140": 20.01, "LifestyleLE140": 51.32, "ShellG140": 18.02, "LifestyleG140": 46.19 },
"NJ": { "ShellLE96": 2318.76, "LifestyleLE96": 5955.32, "ShellLE140": 24.15, "LifestyleLE140": 62.03, "ShellG140": 21.74, "LifestyleG140": 55.83 },
"NM": { "ShellLE96": 1851.5, "LifestyleLE96": 4744.88, "ShellLE140": 19.29, "LifestyleLE140": 49.43, "ShellG140": 17.36, "LifestyleG140": 44.48 },
"NY": { "ShellLE96": 2319.11, "LifestyleLE96": 5956.24, "ShellLE140": 24.16, "LifestyleLE140": 62.04, "ShellG140": 21.75, "LifestyleG140": 55.84 },
"NC": { "ShellLE96": 1710.42, "LifestyleLE96": 4374.28, "ShellLE140": 17.82, "LifestyleLE140": 45.57, "ShellG140": 16.03, "LifestyleG140": 41.01 },
"ND": { "ShellLE96": 1644.7, "LifestyleLE96": 4209.19, "ShellLE140": 17.14, "LifestyleLE140": 43.85, "ShellG140": 15.41, "LifestyleG140": 39.46 },
"OH": { "ShellLE96": 1644.7, "LifestyleLE96": 4209.19, "ShellLE140": 17.14, "LifestyleLE140": 43.85, "ShellG140": 15.41, "LifestyleG140": 39.46 },
"OK": { "ShellLE96": 1644.7, "LifestyleLE96": 4209.19, "ShellLE140": 17.14, "LifestyleLE140": 43.85, "ShellG140": 15.41, "LifestyleG140": 39.46 },
"OR": { "ShellLE96": 2178.62, "LifestyleLE96": 5592.31, "ShellLE140": 22.69, "LifestyleLE140": 58.25, "ShellG140": 20.42, "LifestyleG140": 52.43 },
"PA": { "ShellLE96": 1989.57, "LifestyleLE96": 5102.56, "ShellLE140": 20.73, "LifestyleLE140": 53.15, "ShellG140": 18.65, "LifestyleG140": 47.84 },
"RI": { "ShellLE96": 2241.49, "LifestyleLE96": 5755.15, "ShellLE140": 23.35, "LifestyleLE140": 59.95, "ShellG140": 21.01, "LifestyleG140": 53.95 },
"SC": { "ShellLE96": 1644.7, "LifestyleLE96": 4209.19, "ShellLE140": 17.14, "LifestyleLE140": 43.85, "ShellG140": 15.41, "LifestyleG140": 39.46 },
"SD": { "ShellLE96": 1644.7, "LifestyleLE96": 4209.19, "ShellLE140": 17.14, "LifestyleLE140": 43.85, "ShellG140": 15.41, "LifestyleG140": 39.46 },
"TN": { "ShellLE96": 1747.98, "LifestyleLE96": 4476.71, "ShellLE140": 18.21, "LifestyleLE140": 46.63, "ShellG140": 16.39, "LifestyleG140": 41.97 },
"TX": { "ShellLE96": 1947.11, "LifestyleLE96": 4992.58, "ShellLE140": 20.29, "LifestyleLE140": 52.01, "ShellG140": 18.25, "LifestyleG140": 46.81 },
"UT": { "ShellLE96": 1767.26, "LifestyleLE96": 4526.67, "ShellLE140": 18.41, "LifestyleLE140": 47.15, "ShellG140": 16.57, "LifestyleG140": 42.44 },
"VT": { "ShellLE96": 1984.34, "LifestyleLE96": 5089.02, "ShellLE140": 20.67, "LifestyleLE140": 53.01, "ShellG140": 18.61, "LifestyleG140": 47.71 },
"VA": { "ShellLE96": 2135.28, "LifestyleLE96": 5480.01, "ShellLE140": 22.24, "LifestyleLE140": 57.08, "ShellG140": 20.01, "LifestyleG140": 51.38 },
"WA": { "ShellLE96": 1856.93, "LifestyleLE96": 4762.39, "ShellLE140": 23.65, "LifestyleLE140": 60.74, "ShellG140": 21.27, "LifestyleG140": 54.67 },
"WAGS": { "ShellLE96": 3087.25, "LifestyleLE96": 7303.57, "ShellLE140": 32.16, "LifestyleLE140": 76.08, "ShellG140": 28.94, "LifestyleG140": 68.47 },
"DC": { "ShellLE96": 2177.99, "LifestyleLE96": 5480.01, "ShellLE140": 22.68, "LifestyleLE140": 57.08, "ShellG140": 20.41, "LifestyleG140": 51.38 },
"WV": { "ShellLE96": 1738.13, "LifestyleLE96": 4451.2, "ShellLE140": 18.1, "LifestyleLE140": 46.37, "ShellG140": 16.3, "LifestyleG140": 41.73 },
"WI": { "ShellLE96": 1729.41, "LifestyleLE96": 4428.64, "ShellLE140": 18.02, "LifestyleLE140": 46.13, "ShellG140": 16.21, "LifestyleG140": 41.52 },
"WY": { "ShellLE96": 1799.41, "LifestyleLE96": 4609.94, "ShellLE140": 18.74, "LifestyleLE140": 48.02, "ShellG140": 16.87, "LifestyleG140": 43.22 }
}');

$install->summit = json_decode('{
"CO": { "ShellLE350": 20.64, "LifestyleLE350": 51.95, "ShellG350": 18.58, "LifestyleG350": 46.76 },
"AL": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"AK": { "ShellLE350": 26.71, "LifestyleLE350": 68.68, "ShellG350": 24.04, "LifestyleG350": 61.81 },
"AZ": { "ShellLE350": 18.5, "LifestyleLE350": 47.41, "ShellG350": 16.65, "LifestyleG350": 42.67 },
"AR": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"CA": { "ShellLE350": 28.14, "LifestyleLE350": 71.01, "ShellG350": 25.32, "LifestyleG350": 63.91 },
"CABA": { "ShellLE350": 32.05, "LifestyleLE350": 82.42, "ShellG350": 28.85, "LifestyleG350": 74.18 },
"CT": { "ShellLE350": 22.33, "LifestyleLE350": 57.34, "ShellG350": 20.1, "LifestyleG350": 51.6 },
"DE": { "ShellLE350": 18.31, "LifestyleLE350": 46.93, "ShellG350": 16.48, "LifestyleG350": 42.24 },
"FL": { "ShellLE350": 19.17, "LifestyleLE350": 49.16, "ShellG350": 17.25, "LifestyleG350": 44.24 },
"GA": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"HI": { "ShellLE350": 26.03, "LifestyleLE350": 66.93, "ShellG350": 23.43, "LifestyleG350": 60.24 },
"ID": { "ShellLE350": 19.56, "LifestyleLE350": 50.16, "ShellG350": 17.6, "LifestyleG350": 45.14 },
"IL": { "ShellLE350": 22.3, "LifestyleLE350": 57.27, "ShellG350": 20.07, "LifestyleG350": 51.54 },
"IN": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"IA": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"KS": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"KY": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"LA": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"ME": { "ShellLE350": 19.22, "LifestyleLE350": 49.27, "ShellG350": 17.29, "LifestyleG350": 44.35 },
"MD": { "ShellLE350": 22.07, "LifestyleLE350": 56.63, "ShellG350": 19.86, "LifestyleG350": 50.97 },
"MA": { "ShellLE350": 22.67, "LifestyleLE350": 58.22, "ShellG350": 20.4, "LifestyleG350": 52.4 },
"MI": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"MN": { "ShellLE350": 17.5, "LifestyleLE350": 44.83, "ShellG350": 15.75, "LifestyleG350": 40.34 },
"MS": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"MO": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"MT": { "ShellLE350": 19.31, "LifestyleLE350": 49.51, "ShellG350": 17.38, "LifestyleG350": 44.56 },
"NE": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"NV": { "ShellLE350": 21.55, "LifestyleLE350": 55.33, "ShellG350": 19.4, "LifestyleG350": 49.79 },
"NH": { "ShellLE350": 18.91, "LifestyleLE350": 48.48, "ShellG350": 17.02, "LifestyleG350": 43.63 },
"NJ": { "ShellLE350": 22.82, "LifestyleLE350": 58.6, "ShellG350": 20.53, "LifestyleG350": 52.74 },
"NM": { "ShellLE350": 18.22, "LifestyleLE350": 46.69, "ShellG350": 16.4, "LifestyleG350": 42.02 },
"NY": { "ShellLE350": 22.82, "LifestyleLE350": 58.61, "ShellG350": 20.54, "LifestyleG350": 52.75 },
"NC": { "ShellLE350": 16.83, "LifestyleLE350": 43.04, "ShellG350": 15.15, "LifestyleG350": 38.74 },
"ND": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"OH": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"OK": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"OR": { "ShellLE350": 21.44, "LifestyleLE350": 55.03, "ShellG350": 19.29, "LifestyleG350": 49.53 },
"PA": { "ShellLE350": 19.58, "LifestyleLE350": 50.21, "ShellG350": 17.62, "LifestyleG350": 45.19 },
"RI": { "ShellLE350": 22.06, "LifestyleLE350": 56.63, "ShellG350": 19.85, "LifestyleG350": 50.97 },
"SC": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"SD": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"TN": { "ShellLE350": 17.2, "LifestyleLE350": 44.05, "ShellG350": 15.48, "LifestyleG350": 39.65 },
"TX": { "ShellLE350": 19.16, "LifestyleLE350": 49.13, "ShellG350": 17.24, "LifestyleG350": 44.21 },
"UT": { "ShellLE350": 17.39, "LifestyleLE350": 44.54, "ShellG350": 15.65, "LifestyleG350": 40.09 },
"VT": { "ShellLE350": 19.53, "LifestyleLE350": 50.08, "ShellG350": 17.57, "LifestyleG350": 45.07 },
"VA": { "ShellLE350": 21.01, "LifestyleLE350": 53.92, "ShellG350": 18.91, "LifestyleG350": 48.53 },
"WA": { "ShellLE350": 23.93, "LifestyleLE350": 61.48, "ShellG350": 21.53, "LifestyleG350": 55.33 },
"WAGS": { "ShellLE350": 31.85, "LifestyleLE350": 81.91, "ShellG350": 28.67, "LifestyleG350": 73.72 },
"DC": { "ShellLE350": 22.06, "LifestyleLE350": 56.62, "ShellG350": 19.86, "LifestyleG350": 50.96 },
"WV": { "ShellLE350": 17.1, "LifestyleLE350": 43.8, "ShellG350": 15.39, "LifestyleG350": 39.42 },
"WI": { "ShellLE350": 17.02, "LifestyleLE350": 43.58, "ShellG350": 15.32, "LifestyleG350": 39.22 },
"WY": { "ShellLE350": 17.71, "LifestyleLE350": 45.36, "ShellG350": 15.94, "LifestyleG350": 40.83 }
}');


$install->portland = json_decode('{
"CO": { "ShellLE350": 19.66, "LifestyleLE350": 49.48, "ShellG350": 17.69, "LifestyleG350": 44.53 },
"AL": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"AK": { "ShellLE350": 26.71, "LifestyleLE350": 68.68, "ShellG350": 24.04, "LifestyleG350": 61.81 },
"AZ": { "ShellLE350": 18.5, "LifestyleLE350": 47.41, "ShellG350": 16.65, "LifestyleG350": 42.67 },
"AR": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"CA": { "ShellLE350": 25.12, "LifestyleLE350": 64.55, "ShellG350": 22.61, "LifestyleG350": 58.1 },
"CABA": { "ShellLE350": 27.87, "LifestyleLE350": 71.67, "ShellG350": 25.08, "LifestyleG350": 64.5 },
"CT": { "ShellLE350": 22.33, "LifestyleLE350": 57.34, "ShellG350": 20.1, "LifestyleG350": 51.6 },
"DE": { "ShellLE350": 18.31, "LifestyleLE350": 46.93, "ShellG350": 16.48, "LifestyleG350": 42.24 },
"FL": { "ShellLE350": 19.17, "LifestyleLE350": 49.16, "ShellG350": 17.25, "LifestyleG350": 44.24 },
"GA": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"HI": { "ShellLE350": 26.03, "LifestyleLE350": 66.93, "ShellG350": 23.43, "LifestyleG350": 60.24 },
"ID": { "ShellLE350": 19.56, "LifestyleLE350": 50.16, "ShellG350": 17.6, "LifestyleG350": 45.14 },
"IL": { "ShellLE350": 22.3, "LifestyleLE350": 57.27, "ShellG350": 20.07, "LifestyleG350": 51.54 },
"IN": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"IA": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"KS": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"KY": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"LA": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"ME": { "ShellLE350": 19.22, "LifestyleLE350": 49.27, "ShellG350": 17.29, "LifestyleG350": 44.35 },
"MD": { "ShellLE350": 21.02, "LifestyleLE350": 53.94, "ShellG350": 18.91, "LifestyleG350": 48.54 },
"MA": { "ShellLE350": 22.67, "LifestyleLE350": 58.22, "ShellG350": 20.4, "LifestyleG350": 52.4 },
"MI": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"MN": { "ShellLE350": 17.5, "LifestyleLE350": 44.83, "ShellG350": 15.75, "LifestyleG350": 40.34 },
"MS": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"MO": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"MT": { "ShellLE350": 19.31, "LifestyleLE350": 49.51, "ShellG350": 17.38, "LifestyleG350": 44.56 },
"NE": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"NV": { "ShellLE350": 21.55, "LifestyleLE350": 55.33, "ShellG350": 19.4, "LifestyleG350": 49.79 },
"NH": { "ShellLE350": 18.91, "LifestyleLE350": 48.48, "ShellG350": 17.02, "LifestyleG350": 43.63 },
"NJ": { "ShellLE350": 22.82, "LifestyleLE350": 58.6, "ShellG350": 20.53, "LifestyleG350": 52.74 },
"NM": { "ShellLE350": 18.22, "LifestyleLE350": 46.69, "ShellG350": 16.4, "LifestyleG350": 42.02 },
"NY": { "ShellLE350": 22.82, "LifestyleLE350": 58.61, "ShellG350": 20.54, "LifestyleG350": 52.75 },
"NC": { "ShellLE350": 16.83, "LifestyleLE350": 43.04, "ShellG350": 15.15, "LifestyleG350": 38.74 },
"ND": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"OH": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"OK": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"OR": { "ShellLE350": 21.44, "LifestyleLE350": 55.03, "ShellG350": 19.29, "LifestyleG350": 49.53 },
"PA": { "ShellLE350": 19.58, "LifestyleLE350": 50.21, "ShellG350": 17.62, "LifestyleG350": 45.19 },
"RI": { "ShellLE350": 22.06, "LifestyleLE350": 56.63, "ShellG350": 19.85, "LifestyleG350": 50.97 },
"SC": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"SD": { "ShellLE350": 16.18, "LifestyleLE350": 41.42, "ShellG350": 14.57, "LifestyleG350": 37.28 },
"TN": { "ShellLE350": 17.2, "LifestyleLE350": 44.05, "ShellG350": 15.48, "LifestyleG350": 39.65 },
"TX": { "ShellLE350": 19.16, "LifestyleLE350": 49.13, "ShellG350": 17.24, "LifestyleG350": 44.21 },
"UT": { "ShellLE350": 17.39, "LifestyleLE350": 44.54, "ShellG350": 15.65, "LifestyleG350": 40.09 },
"VT": { "ShellLE350": 19.53, "LifestyleLE350": 50.08, "ShellG350": 17.57, "LifestyleG350": 45.07 },
"VA": { "ShellLE350": 21.01, "LifestyleLE350": 53.92, "ShellG350": 18.91, "LifestyleG350": 48.53 },
"WA": { "ShellLE350": 23.93, "LifestyleLE350": 61.48, "ShellG350": 21.53, "LifestyleG350": 55.33 },
"WAGS": { "ShellLE350": 29.73, "LifestyleLE350": 76.45, "ShellG350": 26.76, "LifestyleG350": 68.8 },
"DC": { "ShellLE350": 21.01, "LifestyleLE350": 53.92, "ShellG350": 18.91, "LifestyleG350": 48.53 },
"WV": { "ShellLE350": 17.1, "LifestyleLE350": 43.8, "ShellG350": 15.39, "LifestyleG350": 39.42 },
"WI": { "ShellLE350": 17.02, "LifestyleLE350": 43.58, "ShellG350": 15.32, "LifestyleG350": 39.22 },
"WY": { "ShellLE350": 17.71, "LifestyleLE350": 45.36, "ShellG350": 15.94, "LifestyleG350": 40.83 }
}');



if($model == 'Signature') {
  if($area <= 96) {
    $response = array(
      'state_code' => $state,
      'shell' => $install->signature->{$state}->ShellLE96,
      'lifestyle' => $install->signature->{$state}->LifestyleLE96
    );
    exit(json_encode($response));
  } elseif($area <= 140) {
    $response = array(
      'state_code' => $state,
      'shell' => round($install->signature->{$state}->ShellLE140 * $area),
      'lifestyle' => round($install->signature->{$state}->LifestyleLE140 * $area)
    );
    exit(json_encode($response));
  } else {
    $response = array(
      'state_code' => $state,
      'shell' => round($install->signature->{$state}->ShellG140 * $area),
      'lifestyle' => round($install->signature->{$state}->LifestyleG140 * $area)
    );
    exit(json_encode($response));
  }
}

if($model == 'Summit') {
  if($area <= 350) {
    $response = array(
      'state_code' => $state,
      'shell' => round($install->summit->{$state}->ShellLE350 * $area),
      'lifestyle' => round($install->summit->{$state}->LifestyleLE350 * $area)
    );
    exit(json_encode($response));
  } else {
    $response = array(
      'state_code' => $state,
      'shell' => round($install->summit->{$state}->ShellG350 * $area),
      'lifestyle' => round($install->summit->{$state}->LifestyleG350 * $area)
    );
    exit(json_encode($response));
  }
}


if($model == 'Portland') {
  if($area <= 350) {
    $response = array(
      'state_code' => $state,
      'shell' => round($install->portland->{$state}->ShellLE350 * $area),
      'lifestyle' => round($install->portland->{$state}->LifestyleLE350 * $area)
    );
    exit(json_encode($response));
  } else {
    $response = array(
      'state_code' => $state,
      'shell' => round($install->portland->{$state}->ShellG350 * $area),
      'lifestyle' => round($install->portland->{$state}->LifestyleG350 * $area)
    );
    exit(json_encode($response));
  }
}