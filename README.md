## Oracle setup
```sql
create user benchmark identified by benchmark account unlock;
grant create session to benchmark;
grant create trigger to benchmark;
grant create table to benchmark;
grant create sequence to benchmark;
grant unlimited tablespace to benchmark;
```
## MySQL setup

```sql
create user benchmark identified by 'benchmark';
create schema benchmark;
grant all on benchmark.* to benchmark;
```

# Running

Run `ora.php` and `mysql.php`.

Analyse a set of queries for performance and planning.

For accurate results, run both Oracle and MySQL on the same system.
