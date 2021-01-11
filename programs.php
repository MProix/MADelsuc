<?php include 'header.html'; 
function read($csv){
    $file = fopen($csv, 'r');
    while (!feof($file) ) {
        $line[] = fgetcsv($file, 1024);
    }
    fclose($file);
    return $line;
}
// Définir le chemin d'accès au fichier CSV
$csv = './static/docs/programs.csv';
$csv = read($csv);
for ($i = 0; $i < count($csv); ++$i){
    echo '<p>';
    print_r($csv[$i]);
    echo '</p>';
}
// echo '<div id="central_part">';
// print_r($csv);
// echo '</div>';
?>






























<!--
<style type="text/css">
T24, .T23, .T14 {font-style: italic;}
.T26, .T16 {font-weight: bold;}
table {width: 680px;}
dt {margin-top: 15px;}
</style>
<div id="central_part">
<h1> List of the programs I wrote during my carrier</h1>
<hr/>
<p>I have always been interested in making my work available to others, and thus I have been writing quite a few programs in the past years.
As I would like to see these programs being actually used, I tried to do my best to reach the highest quality level affordable 
given the time available to this activity in an academic carrier (which is small!)
Most of these programs are involved with NMR signal treatment or NMR experiment analysis</p>
<hr/>
<p>I developped several utilities. The more recent ones can be found in 2 public repositories:</p>
<ul>
 <li>Mostly in <a href="https://bitbucket.org/delsuc/">bitbucket.org/delsuc/</a>
 where I put all my utility codes (some are private though)
 <li>and <a href="https://github.com/delsuc">github.com/delsuc</a> which contains mostly utilities associated to publications
 </ul>
<hr/>
<p> The more important programs are listed below :</p> 
<dl>
<?php

prgm("PALMA", "2016",                                                                                                  
"Afef Cherni, Emilie Chouzenoux,",                                                                                                            
"python",                                                                                                              
"Processing of DOSY experiment with a MaxEnt / L1 parrallel algorithm.",                                                                       
'freely available - <a href="http://palma.labo.igbmc.fr" title="PALMA">see web site</a> ',                                  
'<a href="https://arxiv.org/abs/1608.07055">arxiv 1608.07055</a>', " ");                                                                                                                    

prgm("SPIKE", "2015",                                                                                                  
"L.Chiron, M-A Coutouly, Jean-Philippe Starck, Christian Rolando",                                                                                                            
"python",                                                                                                              
"Spectrometry Processing Innovative KErnel.",                                                                       
'freely available - <a href="https://bitbucket.org/delsuc/spike" title="SPIKE">see web site</a> ',                                  
'<a href="https://arxiv.org/abs/1608.06777">arxiv 1608.06777</a>', " ");                                                                                                                    
	                  
 prgm("urQRd", "2013",
 "L.Chiron",
 "python",
 "Fast Denoising of large experimental datasets",
 'freely available - <a href="http://urqrd.igbmc.fr" title="urQRd">see web site</a> ',
 publi("Chiron, L., van Agthoven, M. A., Kieffer, B., Rolando, C. Delsuc, M.-A","2014",
    "Efficient denoising algorithms for large experimental datasets and their applications in Fourier transform ion cyclotron resonance mass spectrometry. ",
    "Proc Natl Acad Sci USA", "doi:10.1073/pnas.1306700111","",
    "http://www.pnas.org/content/early/2014/01/03/1306700111" ),
"International Patent");

     prgm("RamaDA", "2011",
     "M.Tanty",
     "python",
     "Conformationnal analysis of protein backbone",
     'freely available - <a href="http://ramada.u-strasbg.fr" title="RamaDA">see web site</a> ',
     publi("M. Tanty and M.-A. Delsuc","2011",
        "RamaDA: complete and automated conformational overview of proteins",
        "Arxiv", "1111.5586","",
        "http://arxiv.org/abs/1111.5586" ),
    "");
    prgm("Sophora", "2009",
    "O. Assemat, M.-A. Coutouly, R.Hajjar",
    " python",
    "Correction program for DOSY experiments, improves the quality of the spectra.",
    '<a href="http://www.nmrtec.com" title="Sophora">distributed by NMRtec</a>.',
    publi("O. Assemat, M.-A. Coutouly, R.Hajjar, and M.-A. Delsuc","2010",
        "Validation of molecular mass measurements by means of diffusion-ordered NMR spectroscopy; application to oligosaccharides.",
        "CRChimie", 13,"p412-415",""),
    	'about 50 laboratories today'
	);

	prgm("DOSYm 2.0","2009",
		"M-A Coutouly; in collaboration with NMRtec",
			"F77 - python  -Java",
			'A "plug-in" for TopSpin, based on NPK allowing the DOSY processing by Inverse Laplace transform.',
            '<a href="http://www.nmrtec.com" title="DOSYm">distributed by NMRtec</a>.',
            "",
			'about 50 laboratories today'
	);

	prgm("MW","2008",
		"","Web site in python","This page implements the estimate of molecular mass from the measurement of diffusion coefficient",
		'freely available - <a href="http://abcis.cbs.cnrs.fr/htbin-post/MW/MW.py" title="MW">see web site</a> ',
		publi("Augé et al.","2009","NMR Measure of Translational Diffusion and Fractal Dimension. Application to Molecular Mass Measurement.","J Phys Chem B",113,"p1914-1918",""),
		"26 citations (July 2015)"
	);

    prgm("Pathways","2008",
        "",
        "python",
        "coherence transfert pathways for NMR experiments with Pulsed Field Gradients",
        "from the authors",
        publi("S. Balayssac, M.-A. Delsuc, V. Gilard, Y. Prigent, and M. Malet-Martino", "2009","Two-dimensional DOSY experiment with excitation sculpting water suppression for the analysis of natural and biological media", "J.Magn.Reson.", 196,"pp 78–83",""),
        "");

    prgm("<i>NMRNoteBook</i>","2006",
     "in collaboration with NMRtec",
     "F77 - python  -Java / multiplateform",
     "The companion program of NPK, takes care of the graphical user interface and data managment",
     '<a href="http://www.nmrtec.com" title="MW">distributed by NMRtec</a>.',
     "","more than 1000 users at this date.");

	prgm("NPK","2006",
		"Tramesel, D., V. Catherinot; in collaboration with NMRtec",
			"F77 - python  -Java / multiplateform",
			"Complete NMR processing program. Allows unattended automatic processing of 1D; 2D; 3D and DOSY. Includes FT, MaxEnt and Inverse Laplace transform.",
			'freely available - <a href="http://abcis.cbs.cnrs.fr/NPK" title="NPK">see web site</a> ',
			publi("Tramesel, D., V. Catherinot and M.-A. Delsuc","2007","Modeling of NMR processing, toward efficient unattended processing of NMR experiments.","J.Magn.Reson.",188,"p56-67",""),
			'about 50 laboratories today + embedded in NMRNoteBook'
	);
	 ?>

    <dt>CRAACK</dt>
    <dd><table>
            <tr>
                <td>Date</td>
                <td>2005</td>
            </tr>
            <tr>
                <td>Co-Authors</td>
                <td>C. Benod and J.L. Pons</td>
            </tr>
            <tr><td>Technology</td><td>Web site in perl</td></tr>
            <tr>
                <td>Description</td>
                <td>
                    This is an help to statistically assigning a protein spin system from the chemical shift values.
                    CRAACK is based on two consensus algorithm which tries to acccurate the responses of existant typing modules. 
                    The first algorithm accomplishes the analysis with SVM technologie .
                    The second one use a classical ballot algorithm.
                </td>
            </tr>
            <tr>
                <td>Diffusion</td>
                <td>freely available - <a href="http://abcis.cbs.cnrs.fr/craack/" title="CRAACK">see web site</a> </td>
            </tr>
            <tr>
                <td>Publication</td>
                <td>
<?php echo publi(
	"Benod, C., M. A. Delsuc and J. L. Pons","2006",
	"CRAACK: consensus program for NMR amino acid type assignment.",
	"J Chem Inf Model",46,"1517-22","");
	 ?>
                </td>
            </tr>
            <tr><td>Impact</td><td>~10 hits/day</td></tr>
        </table></dd>

        <dt>Rio-Grande</dt>
        <dd><table>
            <tr>
                <td>Date</td>
                <td>2004</td>
            </tr>
            <tr><td>Technology</td><td>Web site in PHP and Spip</td></tr>
            <tr>
                <td>Description</td>
                <td>
A collective laboratory notebook, allowing the follow-up of multi-tems projects.
Generates public reports as well as a private comprehensive description of the project, available to participating people.
                </td>
	        </tr>
            <tr>
                <td>Diffusion</td>
                <td>freely available - distributed on request </td>
            </tr>
                <tr><td>Impact</td><td>
Widely used in the C.B.S. lab. See <a href="http://www.cbs.cnrs.fr/rio-grande/">Public report</a><br/>
distributed once to a another lab </td></tr>
        </table></dd>

    <?php
    	prgm("DOSYm 1.0","2004",
    		"Tramesel, D., T. Gostan; in collaboration with NMRtec",
    			"F77 -Java / multiplateform",
    			'A "plug-in" for TopSpin, based on Gifa V5 allowing the DOSY processing by Inverse Laplace transform.',
                'distributed by NMRtec and Bruker.',
                "",
    			'about 40 laboratories today'
    	);
    	 ?>

    <dt>RESCUE-2</dt>
    <dd><table>
        <tr>
            <td>Date</td>
            <td>2004</td>
        </tr>
        <tr>
            <td>Co-Authors</td>
            <td>Thérèse Malliavin, Antoine Marin, P.Nicolas</td>
        </tr>
        <tr><td>Technology</td><td>Web site in perl</td></tr>
        <tr>
            <td>Description</td>
            <td>
                Prédiction d'attribution de protéine à partir des déplacements chimiques <sup>1</sup>H <sup>15</sup>N et <sup>13</sup>C.
            </td>
        </tr>
        <tr>
            <td>Diffusion</td>
            <td>freely available - <a href="http://abcis.cbs.cnrs.fr/rescue2/" title="RESCUE-2">see web site</a> </td>
        </tr>
        <tr>
            <td>Publication</td>
            <td>
<?php echo publi(
"Marin, A., T. E. Malliavin, P.Nicolas and M. A. Delsuc",
"2004",
"From NMR chemical shifts to amino acid types: investigation of the predictive power carried by nuclei.",
"J.Bio.NMR",30,"47-60","");
 ?>
        </td>
        </tr>
            <tr><td>Impact</td><td>~10 hits/day </td></tr>
    </table></dd>


        <dt>NMRb</dt>
        <dd><table>
            <tr>
                <td>Date</td>
                <td>2004</td>
            </tr>
            <tr>
                <td>Co-Authors</td>
                <td>J-L.Pons  T.E.Malliavin, D.Tramesel</td>
            </tr>
            <tr><td>Technology</td><td>Web site in PHP</td></tr>
            <tr>
                <td>Description</td>
                <td>
                    Base de données de dépôt des données brutes de données de RMN.
                </td>
	        </tr>
            <tr>
                <td>Diffusion</td>
                <td>freely available - <a href="http://nmrb.cbs.cnrs.fr/" title="NMRb">see web site</a> </td>
            </tr>
            <tr>
                <td>Publication</td>
                <td>
<?php echo publi(
"Pons, J. L., T. E. Malliavin, D. Tramesel and M. A. Delsuc",
"2004",
"NMRb: A web-site repository for raw NMR data-sets.",
"Bioinformatics",20,"3707-3709","");
 ?>
            </td>
            </tr>
                <tr><td>Impact</td><td> </td></tr>
        </table></dd>

<dt>Gifa V5.0</dt>
<dd><table>
    <tr>
        <td>Date</td>
        <td>2002</td>
    </tr>
    <tr>
        <td>Co-Authors</td>
        <td>D.Tramesel, in collaboration with NMRtec</td>
    </tr>
    <tr><td>Technology</td><td>F77 - C  -Java / multiplateform</td></tr>
    <tr>
        <td>Description</td>
        <td>
          a rewrite of Gifa v4, 
        </td>
    </tr>
    <tr>
        <td>Diffusion</td>
        <td>Commercial diffusion by NMRtec </td>
    </tr>
        <tr><td>Impact</td><td>several dozens of licenses sold </td></tr>
</table></dd>


        <dt>TCLand</dt>
        <dd><table>
            <tr>
                <td>Date</td>
                <td>2000</td>
            </tr>
            <tr>
                <td>Co-Authors</td>
                <td>M.Guillet</td>
            </tr>
            <tr><td>Technology</td><td>matlab</td></tr>
            <tr>
                <td>Description</td>
                <td>
                    Analyse et visualisation des données de PCR quantitatives
                </td>
	        </tr>
            <tr>
                <td>Diffusion</td>
                <td>copyright INSERM </td>
            </tr>
            <tr>
                <td>Publication</td>
                <td>
<?php echo publi(
"Sebille, F., K. Gagne, M. Guillet, M.-A. Delsuc and J.-P. Soulillou",
"2001",
"Comparison of specificity and magnitude of T cell, mobilization after xenogeneic or allogeneic direct recognition.", "XENOTRANSPLANTATION", "8","","")
?>
            </td>
            </tr>
                <tr><td>Impact</td><td>International Patent </td></tr>
        </table></dd>

        <dt>FIRE</dt>
        <dd><table>
            <tr>
                <td>Date</td>
                <td>1999</td>
            </tr>
            <tr>
                <td>Co-Authors</td>
                <td>T.Malliavin</td>
            </tr>
            <tr><td>Technology</td><td>F77 and macro gifa V4</td></tr>
            <tr>
                <td>Description</td>
                <td>
                    Un logiciel permettant d'évaluer la construction de structure protéique à partir de spectre 3D 15N HSQC-NOESY, sans étape d'attribution.
                </td>
	        </tr>
            <tr>
                <td>Diffusion</td>
                <td>copyright INSERM </td>
            </tr>
            <tr>
                <td>Publication</td>
                <td>
<p class="P167" style="margin-left:0.25cm;"><span class="T15">Malliavin, T. A., P. Barthe and M. A. Delsuc (2001). "FIRE : an automatic protocol for protein fold recognition and NMR spectral assignment." </span><span class="T14">Theor. Chem. Acc</span><span class="T15"> </span><span class="T16">106</span><span class="T15">: 91-97.</span></p>
            </td>
            </tr>
        </table></dd>

        <dt>RESCUE</dt>
        <dd><table>
            <tr>
                <td>Date</td>
                <td>1998</td>
            </tr>
            <tr>
                <td>Co-Authors</td>
                <td>J-L Pons</td>
            </tr>
            <tr><td>Technology</td><td>Matlab and perl</td></tr>
            <tr>
                <td>Description</td>
                <td>
                    Prédiction d'attribution de protéine à partir des déplacements chimiques <sup>1</sup>H.
                    Diffusion sous forme de logiciel libre d'utilisation sur Internet:
                </td>
	        </tr>
            <tr>
                <td>Diffusion</td>
                <td>http://www.infobiosud.univ-montp1.fr/Rescue
                </td>
            </tr>
            <tr>
                <td>Publication</td>
                <td>
<p class="P167" style="margin-left:0.25cm;"><span class="T15">Pons, J. L. and M.-A. Delsuc (1999). "Rescue : an Artificial Neural Network tool for helping the NMR spectral assignment of proteins." </span><span class="T14">J. Bio. NMR</span><span class="T15"> </span><span class="T16">15</span><span class="T15">: 15-26.</span></p>
            </td>
            </tr>
        </table></dd>

        <dt>Gifa assignment module</dt>
        <dd><table>
            <tr>
                <td>Date</td>
                <td>1997</td>
            </tr>
            <tr>
                <td>Co-Authors</td>
                <td>T.Malliavin and J-L Pons</td>
            </tr>
            <tr><td>Technology</td><td>Gifa v4 macro language</td></tr>
            <tr>
                <td>Description</td>
                <td>
                    Un module d'attribution des spectres de protéines et peptides, intégré dans Gifa.
                    2D et 3D homo et hétéronucléaires, intégration, mesure de relaxation.
                </td>
	        </tr>
            <tr>
                <td>Diffusion</td>
                <td>freely distributed with Gifa V4.
                </td>
            </tr>
            <tr>
                <td>Publication</td>
                <td>
<p class="P167" style="margin-left:0.25cm;"><span class="T15">Malliavin, T. E., J. L. Pons and M. A. Delsuc (1998). "An NMR assignment module implemented in the Gifa NMR processing program." </span><span class="T14">Bioinformatics</span><span class="T15"> </span><span class="T16">14</span><span class="T15">(7): 624-631.</span></p>
            </td>
            </tr>
        </table></dd>

        <dt>CROWD</dt>
        <dd><table>
            <tr>
                <td>Date</td>
                <td>1995</td>
            </tr>
            <tr>
                <td>Co-Authors</td>
                <td>T.Malliavin</td>
            </tr>
            <tr><td>Technology</td><td>F77 - C / Unix</td></tr>
            <tr>
                <td>Description</td>
                <td>
                    Modélisation de la relaxation d'un système de spin quelconque (jusqu'à 1000 spins). Permet le calcul de NOESY ou des ROESY.
                </td>
	        </tr>
            <tr>
                <td>Diffusion</td>
                <td>freely available - <a href="http://abcis.cbs.cnrs.fr" title="Gifa">see web site</a> </td>
            </tr>
        </table></dd>

        <dt>Gifa V4.0</dt>
        <dd><table>
            <tr>
                <td>Date</td>
                <td>1995</td>
            </tr>
            <tr>
                <td>Co-Authors</td>
                <td>T.Malliavin and J-L Pons</td>
            </tr>
            <tr><td>Technology</td><td>F77 - C / Unix</td></tr>
            <tr>
                <td>Description</td>
                <td>
                    Logiciel complet de traitement de données RMN, avec un interface graphique programmable.
                    Diffusion sous licence par le CNRS - manuel de 250 pages.
                </td>
	        </tr>
            <tr>
                <td>Diffusion</td>
                <td>freely available - <a href="http://abcis.cbs.cnrs.fr" title="Gifa">see web site</a> </td>
            </tr>
            <tr>
                <td>Publication</td>
                <td>
<p class="P167" style="margin-left:0.25cm;"><span class="T15">Pons, J. L., T. E. Malliavin and M. A. Delsuc (1996). "Gifa V 4: A complete package for NMR data set processing." </span><span class="T14">J. Biomol. NMR</span><span class="T15"> </span><span class="T16">8</span><span class="T15">(4): 445-452.</span></p>
            </td>
            </tr>
            <tr><td>Impact</td><td>Over 250 laboratories world-wide<br/>226 citations (July 2015) </td></tr>
        </table></dd>
		
        <dt>Gifa V1.0 - V2.0 - V3.0</dt>
        <dd><table>
            <tr>
                <td>Date</td>
                <td>1989 - 1990 - 1993</td>
            </tr
            <tr>
                <td>Co-Authors</td>
                <td>V.Stoven, M.Robin, T.Malliavin, D.Roux, </td>
            </tr>
            <tr><td>Technology</td><td>F77 - C / Unix - VMS</td></tr>
            <tr>
                <td>Description</td>
                <td>
                    Successive versions of the Gifa NMR processing program
                    <ul>
                        <li>V1 : initial version, includes MaxEnt, and FT of 1D, 2D, 3D</li>
                        <li>V2 : ported to Unix / X11-Motif  -  new memory management allowing data-sets of any size.  -  LP, baseline correction</li>
                        <li>V3 : included an embedded macro language</li>
                    </ul>
                </td>
	        </tr>
            <tr>
                <td>Diffusion</td>
                <td>Commercial diffusion, several dozens of laboratory equipped., academical and pharmaceutical.
                    V3 : Sold by Oxford Molecular</td>
            </tr>
        </table></dd>


    <dt> LP</dt>
    <dd><table>
            <tr>
                <td>Date</td>
                <td>1987</td>
            </tr>
            <tr>
                <td>Co-Authors</td>
                <td>Feng Ni &amp; George C. Levy</td>
            </tr>
            <tr><td>Technology</td><td>FORTRAN 77 / Vax VMS</td></tr>
            <tr>
                <td>Description</td>
                <td>
                    Complete Linear Prdiction module, implementated within the MEM/LP program
                    Un module complet de prédiction linéaire implanté dans le logiciel MEM/LP diffusé par la société NMRi.
                </td>
	        </tr>
            <tr>
                <td>Diffusion</td>
                <td>Commercial by the NMRi company - 50 pages manual</td>
            </tr>
            <tr>
                <td>Publication</td>
                <td>
<p class="P167" style="margin-left:0.25cm;"><span class="T15">Delsuc, M. A., F. Ni and G. C. Levy (1987). "Improvement of Linear Prediction Processing of very Low Signal-to-Noise NMR Spectra." </span><span class="T14">J. Magn. Reson.</span><span class="T15"> </span><span class="T16">73</span><span class="T15">: 548-552.</span></p>
                </td>
            </tr>
            <tr><td>Impact</td><td>Several hundreds</td></tr>
        </table></dd>

    <dt> BOWMAN</dt>
    <dd>    <table>
            <tr>
                <td>Date</td>
                <td>1986</td>
            </tr>
            <tr>
                <td>Co-Authors</td>
                <td>D.Piveteau</td>
            </tr>
            <tr>
                <td>Technology</td>
                <td>Pascal / Aspect 2000-3000</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>
                    A program computing the density matrix evolution for 2 coupled spin 1/2.
                    Displays the magnetisation trajectory in physical space.
                    Simulates complex pulse sequences, and generates 1D and 2D FIDs, which can be processed on the spectrometer.
                </td>
	        </tr>
            <tr>
                <td>Diffusion</td>
                <td> ABACUS</td>
                </tr>
                <tr>
                    <td>Publication</td>
                    <td>                    <p class="P167" style="margin-left:0.25cm;"><span>Piveteau, D., M. A. Delsuc and J. Y. Lallemand (1986). ""BOWMAN" A Versatile Simulation Program for High-Resolution, NMR Multipulse Experiments." </span><i>J. Magn. Reson.</i><b>70</b><span class="T15">: 290-294.</span></p>
                </td>
            </tr>
        </table></dd>
<dt> FORTH-24</dt>
<dd>    <table>
        <tr>
            <td>Date</td>
            <td>1985</td>
        </tr>
        <tr>
            <td>Technology</td>
            <td>Aspect 2000 -3000 Assembling Technology<br/>FORTH Technology</td>
        </tr>
        <tr>
            <td>Description</td>
            <td>
                Implementation of the FORTH programming langugae on the Bruker Aspect architecture.
                Complete working environment : editor; copmiler, assembler, file system, real time managment.
                Allows driving the pulse programmer and writing pulse sequences on the WM architecture
            </td>
        </tr>
        <tr>
            <td>Diffusion</td>
            <td>ABACUS - 30 pages Manual</td>
        </tr>
    </table></dd>
</dl>


<hr/>
<p>I have tried to have active links for this programs whenever possible.
    However, for the older ones, this has not been possible, mostly due to my <i>inconséquence</i> in not keeping a live track of them.
    We are living in a strange numeric world, where 20 years back in the past is so old, that we are not even able to keep any record of it !
    <span class="rem">(Have you tried to read a scientific paper dated before 1990 ? I cannot, digital libraries don't go that far, and REAL libraries have closed all around me!)</span>
<hr/>
</div> -->
<?php include 'footer.html'; ?>