<?php include 'header.html'; 
?>
<div id="central_part">
    <h1> List of the programs I wrote during my carrier</h1>
    <hr>
    <p>I have always been interested in making my work available to others, and thus I have been writing quite a few programs in the past years.
    As I would like to see these programs being actually used, I tried to do my best to reach the highest quality level affordable 
    given the time available to this activity in an academic carrier (which is small!).
    Most of these programs are involved with NMR signal treatment or NMR experiment analysis</p>
    <hr/>
    <p>I developped several utilities. The more recent ones can be found in <a href="https://github.com/delsuc">GitHub</a>. Mostly in  where I put all my codes (some are private though).</p>
    <hr>
    <p> The more important programs are listed below :</p>
    <p id="ordered_pgms">
        <label for="sort-select">The list is sorted by <span id="sortedTable">descending dates. </span>Sort the list by :</label>
        <select name="sorts" id="sort-select">
            <option value="desDate">Descending Date</option>
            <option value="asDate">Ascending Date</option>
            <option value="desName">Descending Name</option>
            <option value="asName">Ascending Name</option>
            <option value="desTech">Descending Technology</option>
            <option value="asTech">Ascending Technology</option>
        </select>
    </p>
    <div id="programsTable">
    </div>
</div>
<?php include 'footer.html'; ?>